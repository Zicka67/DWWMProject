//img qui tourne horizontalement en boucle
document.addEventListener('DOMContentLoaded', function() {
    
    if (window.location.pathname === '/') {
        const fullScreen = document.querySelector('.full-screen');
        const bgImages = Array.from(fullScreen.querySelectorAll('.bg-image'));
        let position = 0;
        let speed = 0.4;
        const imageWidth = bgImages[0].offsetWidth;

        function moveBackground() {
            position += speed;

            if (position >= imageWidth) {
                position = 0;
            }

            bgImages.forEach((bgImage, index) => {
                let pos = position + (index * imageWidth);
                if (index % 2 === 0) {
                    bgImage.style.transform = `translateX(-${pos}px)`;
                } else {
                    bgImage.style.transform = `translateX(${pos}px)`;
                }
            });

            requestAnimationFrame(moveBackground);
        }

        moveBackground();

        setInterval(function() {
            position = 0;
        }, 70000);
    }
});