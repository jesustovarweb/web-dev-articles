# Emparejar productos de WooCommerce por SKU en WPML (run-once)

Este directorio contiene una utilidad de ejecución única (run-once) cuyo objetivo es emparejar productos de WooCommerce ya existentes en WPML utilizando el SKU como criterio común.

El script está pensado para escenarios reales de migración, importaciones o corrección de catálogos, en los que existen productos por idioma pero no están correctamente relacionados dentro del mismo grupo de traducciones (trid) en WPML.

## Qué hace

- Recorre los productos de WooCommerce que tienen un SKU definido.
- Agrupa los productos por SKU.
- Para cada SKU con dos o más productos, asigna el mismo grupo de traducción (trid) a todos ellos.
- Se ejecuta automáticamente al activar el plugin.

## Dónde colocarlo

Este script debe instalarse como un plugin normal de WordPress (por ejemplo, copiando el directorio dentro de `wp-content/plugins/` o subiéndolo como zip) y activarse desde el panel de administración.

Una vez ejecutado, debe desactivarse.

## Cuándo tiene sentido usarlo

- Migraciones donde los productos se han importado por idioma sin relación WPML.
- Catálogos con productos “duplicados” que comparten SKU.
- Correcciones puntuales de relaciones de traducción en tiendas existentes.

No es una herramienta pensada para uso recurrente ni para ejecutarse en cada despliegue.

## Notas importantes

Este script se desarrolló y probó en un entorno controlado, con las siguientes condiciones:

- WPML estaba activo y correctamente configurado.
- Los productos ya existían por idioma.
- Todos los productos tenían datos de idioma válidos.
- El SKU era un identificador fiable para emparejar productos.
- Los productos ya pertenecían a algún grupo de traducción (trid).

Bajo estas condiciones, el enfoque directo funciona correctamente.  
No está pensado para activarse “a ciegas” en cualquier entorno.

Antes de usarlo:

- Haz siempre una copia de seguridad de la base de datos.
- Pruébalo en un entorno de staging si es posible.
- Verifica que WPML está activo y que los productos tienen metadatos de idioma correctos.
- Asegúrate de que el SKU es un criterio válido para emparejar productos en tu proyecto.

En entornos donde estas condiciones no se cumplan (por ejemplo, productos sin trid, configuraciones incompletas de idiomas o importaciones parciales), conviene endurecer el script con comprobaciones adicionales antes de ejecutarlo.

## Artículo relacionado

Este script se explicará en detalle en un artículo del blog más adelante.
