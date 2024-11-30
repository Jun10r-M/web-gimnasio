const icon = document.getElementById('menu-icon');
const menu = document.getElementById('menu');
const main = document.getElementById('main');
const img = document.getElementById('img-menu');
const lista_icon = document.getElementById('listas_icon');
const listas_text = document.getElementById('listas_text');

let togle = false

icon.addEventListener('click', function() {
    if(!togle) {
        main.style.gridTemplateColumns = "0.05fr 2fr";
        img.src = "../image/marcar.png";
        img.style.padding = "5px";
        img.style.marginTop = "0px";
        img.style.width = "80%";
        listas_text.style.display = "none";
        lista_icon.style.display = "flex";
        lista_icon.style.padding = "10px";
    } else {
        main.style.transition = "grid-template-columns 1s ease";
        img.src = "../image/logo_black-removebg-preview.png";
        lista_icon.style.display = "none";
        listas_text.style.display = "flex";
        main.style.gridTemplateColumns = "0.4fr 2fr";
    }
    togle = !togle;
});

const check = document.getElementById('int_check');
const select_menu = document.querySelector('.menu_select');
    
    check.addEventListener('change', function() {
        if (check.checked) {
            select_menu.style.display = 'flex';
        } else {
            select_menu.style.display = '';
        }
    });