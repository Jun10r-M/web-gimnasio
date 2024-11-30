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
                <h1>Clientes</h1>
                <div class="buttons">
                    <label class ="lbl_btn" for="insertar">
                        Registrar clientes
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
                            <th scope="col">Nombre</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Estatura</th>
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
            <form id="formulario_clientes" action="post">
                <input type="hidden" name="idAsistencia" id="idAsistencia">
                <label for="">
                    Nombre *
                </label>
                <input type="number" name="idnombre" id="idnombre" >
                <label for="">
                    Peso *
                </label>
                <input type="number" name="peso" id="peso" >
                <label for="">
                    Estatura *
                </label>
                <input type="number" name="estatura" id="estatura" >
                <label for="">
                    Estado*
                </label>
                <input type="datetime-local" name="estado" id="estado">
                <input type="submit" value="Registrar" class="bt-registrar">
            </form>
        </div>
    
    </main>
    <script src="js/select_clientes.js"></script>
    <script src="./js/modales.js"></script>
</body>
</html>