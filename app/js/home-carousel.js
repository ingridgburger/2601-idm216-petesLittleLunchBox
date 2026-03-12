document.addEventListener('DOMContentLoaded', function() {
  const carouselImages = document.querySelectorAll('.carousel-img');
  if (!carouselImages.length) return;
  let currentIndex = 0;

  function showImage(index) {
    carouselImages.forEach((img, i) => {
      img.classList.toggle('active', i === index);
    });
  }

  function rotateImage() {
    currentIndex = (currentIndex + 1) % carouselImages.length;
    showImage(currentIndex);
  }

  setInterval(rotateImage, 5000);
  showImage(currentIndex);
});