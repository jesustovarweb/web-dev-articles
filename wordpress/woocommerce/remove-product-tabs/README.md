# Eliminar pestañas de producto por defecto en WooCommerce

## Qué hace

Este snippet elimina una o varias de las pestañas que WooCommerce muestra por defecto en la ficha de producto: descripción, valoraciones e información adicional.

Funciona interceptando el listado de pestañas generado por WooCommerce y eliminando aquellas que no son necesarias antes de que se rendericen en la página.

## Dónde colocarlo

Puedes colocar este snippet en cualquiera de las siguientes ubicaciones:

- En el archivo `functions.php` de tu tema (preferiblemente un tema hijo)
- En un plugin de utilidades propio
- En un plugin de snippets de código, para configuraciones sencillas

## Cómo personalizarlo

El snippet utiliza una lista predefinida de identificadores de pestañas para decidir cuáles deben eliminarse.

Para personalizar su comportamiento, basta con modificar esa lista y añadir o quitar los identificadores correspondientes a las pestañas que quieras ocultar.  
Por ejemplo, puedes eliminar solo la pestaña de valoraciones o mantener la descripción y eliminar el resto.

## Notas

- Algunos temas sobrescriben o reconstruyen las pestañas de producto mediante plantillas personalizadas o bloques. En esos casos, este snippet puede no tener efecto.
- Antes de eliminar pestañas, asegúrate de que la información que contienen se muestra en otro lugar si es relevante para SEO o experiencia de usuario.
- Agrupar la eliminación de pestañas en una única función facilita el mantenimiento y evita código duplicado.

## Artículo de origen

- https://www.jesustovar.es/veteasabertu/eliminar-pestana-de-descripcion-valoraciones-o-informacion-adicional-en-woocommerce
