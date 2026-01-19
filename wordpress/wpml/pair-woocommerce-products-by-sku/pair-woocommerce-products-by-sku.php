<?php
/**
 * Plugin Name: Pair WooCommerce products by SKU (run-once)
 * Description: Pairs already existing WooCommerce products by SKU using WPML.
 * Version: 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Runs on plugin activation. This is a run-once utility:
 * activate, let it run, then deactivate.
 */
register_activation_hook( __FILE__, 'pps_run_pair_by_sku' );

function pps_run_pair_by_sku() {
	global $wpdb;

	// 1. Load product IDs + SKUs.
	$rows = $wpdb->get_results(
		"
		SELECT p.ID AS product_id, pm.meta_value AS sku
		FROM {$wpdb->posts} p
		JOIN {$wpdb->postmeta} pm
			ON p.ID = pm.post_id
			AND pm.meta_key = '_sku'
		WHERE p.post_type = 'product'
			AND pm.meta_value != ''
		"
	);

	// 2. Group by SKU.
	$groups = array();
	foreach ( $rows as $row ) {
		$groups[ $row->sku ][] = (int) $row->product_id;
	}

	// 3. For each SKU group with 2+ products, assign the same trid.
	foreach ( $groups as $sku => $ids ) {
		if ( count( $ids ) < 2 ) {
			continue;
		}

		// Get trid from the first product (if any).
		$first      = array_shift( $ids );
		$first_lang = apply_filters(
			'wpml_element_language_details',
			null,
			array(
				'element_id'   => $first,
				'element_type' => 'post_product',
			)
		);

		$trid = $first_lang ? $first_lang->trid : false;

		// Put first element back into the list.
		array_unshift( $ids, $first );

		foreach ( $ids as $pid ) {
			$lang = apply_filters(
				'wpml_element_language_details',
				null,
				array(
					'element_id'   => $pid,
					'element_type' => 'post_product',
				)
			);

			if ( ! $lang ) {
				continue;
			}

			// source_language_code only for translations.
			// Assumes 'es' is the site's default/source language.
			$source = ( $lang->language_code === 'es' ) ? null : 'es';

			do_action(
				'wpml_set_element_language_details',
				array(
					'element_id'           => $pid,
					'element_type'         => 'post_product',
					'trid'                 => $trid,
					'language_code'        => $lang->language_code,
					'source_language_code' => $source,
					'check_duplicates'     => false,
				)
			);
		}
	}
}
