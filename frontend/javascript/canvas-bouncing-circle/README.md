# Círculo animado rebotando en canvas

Este ejemplo muestra cómo animar un círculo dentro de un elemento canvas de HTML utilizando JavaScript, haciendo que rebote contra los límites del lienzo.

El objetivo del snippet no es explicar en detalle el funcionamiento de la API de canvas, sino ofrecer una base limpia y funcional sobre la que construir animaciones más complejas.

## Qué hace

- Dibuja un círculo dentro de un canvas HTML
- Actualiza su posición en cada frame
- Detecta colisiones con los bordes del canvas
- Invierte la dirección del movimiento al alcanzar los límites
- Utiliza un bucle de animación adecuado para gráficos en tiempo real

## Dónde encaja este ejemplo

Este snippet es útil como punto de partida para:

- Animaciones simples en canvas.
- Juegos o simulaciones básicas.
- Visualizaciones dinámicas.
- Pruebas de concepto con gráficos 2D.

Representa una forma habitual de trabajar con canvas en proyectos reales, separando estructura, lógica y animación.

## Notas

- El ejemplo utiliza un bucle de animación basado en el refresco del navegador, más adecuado que temporizadores genéricos para este tipo de gráficos.
- El código está pensado para ser fácil de extender: velocidad, tamaño, número de objetos o comportamiento de colisión.
- No se incluyen controles ni configuraciones externas para mantener el ejemplo simple y claro.

## Artículo de origen

https://www.jesustovar.es/veteasabertu/dibujar-en-canvas-de-html-con-javascript
