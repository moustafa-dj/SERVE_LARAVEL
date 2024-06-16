document.addEventListener('DOMContentLoaded', function () {
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const slidesContainer = document.querySelector('.slides');

    function changeSlide(index) {
        console.log('Changing slide to index:', index);
        currentIndex = (index + totalSlides) % totalSlides;
        const offset = -currentIndex * 100;
        slidesContainer.style.transform = `translateX(${offset}%)`;
        console.log('Current slide index is now:', currentIndex);
    }

    prevButton.addEventListener('click', function () {
        changeSlide(currentIndex - 1);
    });

    nextButton.addEventListener('click', function () {
        changeSlide(currentIndex + 1);
    });

    function autoSlide() {
        changeSlide(currentIndex + 1);
        setTimeout(autoSlide, 5000); // Change slide every 5 seconds
    }

    autoSlide();
});
