const slides = document.querySelector('.carousel-slides');
const slideCount = document.querySelectorAll('.slide').length;
const slideWidth = document.querySelector('.slide').offsetWidth;
let index = 0;

function showNextSlide() {
    index = (index + 1) % slideCount;
    const offset = -index * slideWidth;
    slides.style.transform = `translateX(${offset}px)`;
}


setInterval(showNextSlide, 3000);