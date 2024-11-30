const check = document.getElementById('insertar');
const modal = document.getElementById('modal');
const closemodal = document.getElementById('cerrarmodal');
const secciones = document.getElementById('secciones');
    
    check.addEventListener('change', function() {
        if (check.checked) {
            modal.style.transform = 'translateY(0)'
            secciones.style.filter = 'blur(20px)'
        } else {
            modal.style.transform = 'translateY(-100vh)'
        }
    });
    closemodal.addEventListener('click', function(){
        if (check.checked) {
            modal.style.transform = 'translateY(-100vh)'
            check.checked = false;
            secciones.style.filter = 'blur(0)'
        } else {
            modal.style.transform = 'translateY(-100vh)'
            check.checked = false;
        }
    })