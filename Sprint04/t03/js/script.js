let slideIndex = 0;
showSlideAuto();

function changeSlide(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
    let slides = document.getElementsByClassName('slide');
    if (n > slides.length){slideIndex = 1;}
    if (n < 1){slideIndex = slides.length;}
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}

function showSlideAuto() {
    let slides = document.getElementsByClassName('slide');
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlideAuto, 3000);
}
