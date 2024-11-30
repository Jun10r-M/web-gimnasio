const slider = document.querySelector('.slider-inner');
const slider_inner = document.querySelectorAll(' .slider-inner img');
const right = document.getElementById('right');
const left = document.getElementById('left');

let index = 0;
const totalImages = slider_inner.length;

function updateSlider() {
    let porcentaje = index * -100;
    slider.style.transform = `translateX(${porcentaje}%)`;
}


const interval = setInterval(function () {
    index++;
    if (index >= totalImages) {
        index = 0;
    }
    updateSlider();
}, 3000); 

right.addEventListener('click', function () {
    index++;
    if (index >= totalImages) {
        index = 0; 
    }
    updateSlider();
});

left.addEventListener('click', function () {
    index--;
    if (index < 0) {
        index = totalImages - 1; 
    }
    updateSlider();
});
