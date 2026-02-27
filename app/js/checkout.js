document.addEventListener('DOMContentLoaded', () => {
    const applePayBtn = document.querySelector('.apple-pay-btn');

    if (applePayBtn) {
        applePayBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const overlay = document.createElement('div');
            const popup = document.createElement('div');
            
            Object.assign(overlay.style, {
                position: 'fixed',
                top: '0',
                left: '0',
                width: '100%',
                height: '100%',
                backgroundColor: 'rgba(0,0,0,0.7)',
                zIndex: '2147483646',
                display: 'block'
            });

            Object.assign(popup.style, {
                position: 'fixed',
                bottom: '-100%',
                left: '0',
                width: '100%',
                zIndex: '2147483647',
                transition: 'bottom 0.4s cubic-bezier(0.25, 1, 0.5, 1)',
                display: 'flex',
                justifyContent: 'center',
                pointerEvents: 'none'
            });

            popup.innerHTML = `
                <img src="app-images/misc/apple-pay-popup.png" 
                     style="width: 100%; 
                            max-width: 393px; 
                            border-radius: 85px 85px 0px 0px;
                            height: auto; 
                            display: block;
                            pointer-events: auto;
                            margin: 0 auto;
                            border-radius: 20px 20px 0 0;">`;

            document.body.appendChild(overlay);
            document.body.appendChild(popup);

            setTimeout(() => {
                popup.style.bottom = '0';
            }, 50);

            const goHome = () => {
                localStorage.setItem('checkoutTimestamp', Date.now());
                window.location.href = 'home.php';
            };
            
            setTimeout(() => {
                overlay.onclick = goHome;
                popup.onclick = goHome;
                window.onclick = goHome;
            }, 500);
        });
    }
});