document.addEventListener('DOMContentLoaded', () => {
    const popup = document.getElementById('persona-popup');
    const popupImage = document.getElementById('popup-image');
    const closeLink = popup.querySelector('.popup-close');
    const overlay = popup.querySelector('.popup-overlay');

    document.querySelectorAll('.user-card-link').forEach(card => {
        card.addEventListener('click', () => {
            popupImage.src = card.dataset.image;
            popup.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    function closePopup(e) {
        if (e) e.preventDefault();
        popup.classList.remove('active');
        popupImage.src = '';
        document.body.style.overflow = '';
    }

    closeLink.addEventListener('click', closePopup);
    overlay.addEventListener('click', closePopup);
});
