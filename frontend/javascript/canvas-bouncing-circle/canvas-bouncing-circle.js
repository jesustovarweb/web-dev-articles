document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');

    // Circle properties
    const radius = 50;
    let x = canvas.width / 2;
    let y = canvas.height / 2;
    let velocityX = 2;
    let velocityY = 2;

    /**
     * Clears the canvas and draws the circle in its current position.
     */
    function drawCircle() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        ctx.beginPath();
        ctx.arc(x, y, radius, 0, Math.PI * 2);
        ctx.fillStyle = 'blue';
        ctx.fill();
        ctx.stroke();
    }

    /**
     * Updates the circle position and reverses direction
     * when hitting canvas boundaries.
     */
    function updatePosition() {
        if (x + radius > canvas.width || x - radius < 0) {
            velocityX = -velocityX;
        }

        if (y + radius > canvas.height || y - radius < 0) {
            velocityY = -velocityY;
        }

        x += velocityX;
        y += velocityY;
    }

    /**
     * Main animation loop.
     */
    function animate() {
        updatePosition();
        drawCircle();
        requestAnimationFrame(animate);
    }

    animate();
});
