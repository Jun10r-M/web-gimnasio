<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styletablas.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    <main> 
        <div class="secciones" id="secciones">   
            <section class="titulo">
                <h1>Asistencias</h1>
                <div class="buttons">
                    <label class ="lbl_btn" for="insertar">
                        Registrar asistencia
                        <input type="checkbox" id="insertar" style="display: none;">
                    </label>
                    <label class ="lbl_btn" for="reporte">
                        Generar Reporte
                        <input type="checkbox" id="reporte" style="display: none;">
                    </label>
                </div>  
            </section>

            <section class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">F. Entrada</th>
                            <th scope="col">F. Salida</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="data-table">
                    </tbody>
                </table>
            </section>
        </div>

        <div id="modal" class="modal">
            <span id="cerrarmodal">X</span>
            <form id="formulario_asistencia" action="post">
                <input type="hidden" name="idAsistencia" id="idAsistencia">
                <label for="">
                    Cliente *
                </label>
                <input type="number" name="idCliente" id="idCliente" >
                <label for="">
                    Fecha Entrada *
                </label>
                <input type="datetime-local" name="fechaEntrada" id="fechaEntrada">
                <label for="">
                    Fecha Salida *
                </label>
                <input type="datetime-local" name="fechaSalida" id="fechaSalida">
                <input type="submit" value="Registrar" class="bt-registrar">
            </form>
        </div>
    
    </main>
    <script src="js/select_asitencia.js"></script>
    <script src="./js/modales.js"></script>
</body>
</html>