let slideIndex = 0;

function showSlide() {
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;
    slides.forEach(slide => {
        slide.style.display = 'none';
    });
    if (slideIndex >= totalSlides) { slideIndex = 0; }
    if (slideIndex < 0) { slideIndex = totalSlides - 1; }
    slides[slideIndex].style.display = 'flex';
}

function nextSlide() {
    slideIndex++;
    showSlide();
}

function prevSlide() {
    slideIndex--;
    showSlide();
}

// Tampilkan slide pertama ketika halaman dimuat
showSlide();

// Ambil navbar dari DOM
const navbar = document.getElementById('navbar');

// Tambahkan event listener ketika halaman di-scroll
window.addEventListener('scroll', function() {
    // Jika posisi scroll lebih besar dari 50px, tambahkan class untuk mengubah warna latar belakang navbar
    if (window.scrollY > 5) {
        navbar.classList.add('navbar-bg');
    } else {
        navbar.classList.remove('navbar-bg');
    }
});
