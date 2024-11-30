$(document).ready(function(){
refrescar(); 
let edit = false;
function refrescar() {
    $.ajax({
        url: '../php/select_clientes.php',
        method: 'GET',
        success: function(data) {
            const tbody = $('#data-table');
            tbody.empty();
            data.forEach(row => {
                tbody.append(
                    `<tr elementoid="${row.idCliente}">
                        <td style="text-align:center">${row.idCliente}</td>
                        <td style="text-align:center">${row.nombreCliente}</td>
                        <td style="text-align:center">${row.peso}</td>
                        <td style="text-align:center">${row.estatura}</td>
                        <td style="text-align:center">${row.estado}</td>
                        <td style="display:flex; justify-content:center; align-items:center">
                            <label class="btn_up" for="btn_up">
                                Actualizar
                                <input type="checkbox" id="btn_up" style="display:none">
                            </label> 
                        </td>
                    </tr>`
                );
            });
        }
    });
    
}

$('#formulario_clientes').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    let url = edit === false ? '../php/insert_asistencia.php' : '../php/update_asistencia.php';
    
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log('Success:', response);
            if (response.includes('Registro exitoso')) {
                refrescar();
            } else {
                alert(response)
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error:', errorThrown);
        }
    });
});

$(document).on('click', '.btn_up', function() {
    let elemento = $(this).closest('[elementoid]');
    let id = $(elemento).attr('elementoid');
    const modal = document.getElementById('modal');
    const check = document.getElementById('btn_up');
    const closemodal = document.getElementById('cerrarmodal');
    
    check.addEventListener('change', function() {
        if (check.checked) {
            modal.style.transform = 'translateY(0)';
            secciones.style.filter = 'blur(20px)';
        } else {
            modal.style.transform = 'translateY(-100vh)';
        }
    });
    
    closemodal.addEventListener('click', function(){
        modal.style.transform = 'translateY(-100vh)';
        check.checked = false;
        secciones.style.filter = 'blur(0)';
    });


    $.post('../php/selectid_asistencia.php', { id: id }) // Asegúrate de enviar el ID
        .done(function(response) {
            console.log('Datos recibidos:', response); // Ver datos recibidos
            try {
                let date = JSON.parse(response);
                $('#idCliente').val(date.idCliente);
                $('#fechaEntrada').val(date.fechaEntrada);
                $('#fechaSalida').val(date.fechaSalida);
                $('#idAsistencia').val(date.idAsistencia);
                edit = true;
            } catch (e) {
                console.error('Error: Response is not valid JSON. Check console for details.');
            }
        })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.error('AJAX error:', textStatus, errorThrown);
        alert('Error: Could not retrieve data. Check console for details.');
    });

});
});

