# Pair WooCommerce products by SKU in WPML (run-once)

This directory contains a run-once utility designed to pair already existing WooCommerce products in WPML using the SKU as a common identifier.

The script is intended for real-world migration, import or catalog-fixing scenarios where products exist per language but are not properly linked within the same WPML translation group (trid).

## What it does

- Loads WooCommerce products with a defined SKU.
- Groups products by SKU.
- For each SKU with two or more products, assigns the same translation group (trid) to all of them.
- Runs automatically when the plugin is activated.

## Where to put it

This script must be installed as a regular WordPress plugin (for example, by copying the directory into `wp-content/plugins/` or uploading it as a zip) and activated from the admin panel.

Once it has run, it should be deactivated.

## When it makes sense

- Migrations where products were imported per language without WPML relationships.
- Catalogs with “duplicate” products sharing the same SKU.
- One-off fixes of translation relationships in existing stores.

It is not intended for repeated or automated execution.

## Important notes

This script was developed and tested in a controlled environment with the following conditions:

- WPML was active and properly configured.
- Products already existed per language.
- All products had valid language metadata.
- SKU was a reliable identifier for pairing products.
- Products already belonged to a translation group (trid).

Under these assumptions, the straightforward approach works correctly.  
It is not meant to be activated blindly in any environment.

Before using it:

- Always take a full database backup.
- Preferably test it in a staging environment.
- Verify that WPML is active and products have valid language metadata.
- Make sure SKU is a safe and reliable pairing criterion in your project.

If your environment does not guarantee these assumptions (for example, missing trid data, incomplete language setup or partial imports), consider hardening the script with additional safety checks before running it.

## Related article

This script will be explained in detail in a future blog article.
