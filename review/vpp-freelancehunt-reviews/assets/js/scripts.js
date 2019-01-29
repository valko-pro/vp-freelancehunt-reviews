var controls = document.querySelectorAll('.controls');
    slides_wrapper = document.querySelector('.vppfr_reviews_wrapper');
    slides = document.querySelectorAll('.vppfr_reviews_wrapper .vppfr_review');
    currentSlide = 0;
    slideInterval = setInterval(nextSlide,2000);
    playing = true;
    pauseButton = document.getElementById('pause');
    next = document.getElementById('next');
    previous = document.getElementById('previous');

function nextSlide(){
    goToSlide(currentSlide+1);
};

function previousSlide(){
    goToSlide(currentSlide-1);
};

function goToSlide(n){
    slides[currentSlide].className = 'vppfr_review';
    currentSlide = (n+slides.length)%slides.length;
    slides[currentSlide].className = 'vppfr_review showing';
    var h_text = slides[currentSlide].querySelector('.vppfr_text').scrollHeight;
        h_customer = slides[currentSlide].querySelector('.vppfr_customer').scrollHeight;
        h_total = h_text + h_customer + 'px';
    slides_wrapper.style.height = h_total;
};

function pauseSlideshow(){
    pauseButton.innerHTML = '&#9658;'; // play character
    playing = false;
    clearInterval(slideInterval);
};

function playSlideshow(){
    pauseButton.innerHTML = '&#10074;&#10074;'; // pause character
    playing = true;
    slideInterval = setInterval(nextSlide,2000);
};

pauseButton.onclick = function(){
    if(playing){ pauseSlideshow(); }
    else{ playSlideshow(); }
};

next.onclick = function(){
    pauseSlideshow();
    nextSlide();
};
previous.onclick = function(){
    pauseSlideshow();
    previousSlide();
};

