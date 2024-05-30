document.addEventListener("DOMContentLoaded", function() {
  const slideContainer = document.querySelector(".carousel-slide");
  const slides = document.querySelectorAll(".carousel-slide img");
  const prevBtn = document.querySelector("#prevBtn");
  const nextBtn = document.querySelector("#nextBtn");
  let currentIndex = 0;

  function showSlide(index) {
      // Menggeser slideContainer ke kiri untuk menampilkan slide pada index tertentu
      slideContainer.style.transform = `translateX(-${index * slides[0].clientWidth}px)`;
  }

  function nextSlide() {
      currentIndex++;
      if (currentIndex >= slides.length) {
          currentIndex = 0;
      }
      showSlide(currentIndex);
  }

  function prevSlide() {
      currentIndex--;
      if (currentIndex < 0) {
          currentIndex = slides.length - 1;
      }
      showSlide(currentIndex);
  }

  // Tambahkan event listener untuk tombol prev dan next
  prevBtn.addEventListener("click", prevSlide);
  nextBtn.addEventListener("click", nextSlide);

  // Atur gaya transisi pada slideContainer untuk animasi yang mulus
  slideContainer.style.transition = "transform 0.5s ease-in-out";

  // Tampilkan slide awal
  showSlide(currentIndex);
});

const menu = document.getElementById('menu');
const btn = document.getElementById('menu-btn');
const loginBtn = document.getElementById('login-btn');
const popup = document.getElementById('login-popup');
const overlay = document.createElement('div');

overlay.classList.add('overlay');
document.body.appendChild(overlay);

function openPopup() {
    popup.style.display = 'block';
    overlay.style.display = 'block';
}
function closePopup() {
    popup.style.display = 'none';
    overlay.style.display = 'none';
}

loginBtn.addEventListener('click', openPopup);
overlay.addEventListener('click', closePopup);

function openNav() {
    menu.style.display = "block";
}
function closeNav() {
    menu.style.display = "none";
}
btn.addEventListener('change',function() {
    if (btn.checked) {
        openNav();
    } else {
        closeNav();
    }
});