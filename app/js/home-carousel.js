document.addEventListener('DOMContentLoaded', function() {
  const heroImage = document.querySelector('.home-hero img');
  
  if (!heroImage) return;
  
  const images = [
    'app-images/carousel/carousel-1.webp',
    'app-images/carousel/carousel-2.webp',
    'app-images/carousel/carousel-3.webp'
  ];
  
  let currentIndex = 0;
  
  function rotateImage() {
    currentIndex = (currentIndex + 1) % images.length;
    heroImage.src = images[currentIndex];
  }
  
  setInterval(rotateImage, 5000);
});