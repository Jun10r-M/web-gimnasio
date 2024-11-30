<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" translate = "no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="desciption" content="Energyn es una negocio que esta a la disposicon de todos los uasurios de la region de Ica">
    <meta name="autho" content="Junior Mendoza">
    <meta name="datetime" content="20-09-24">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="/css/menu.css" rel="stylesheet" type="text/css">
    <title>ENERGYN | Menu</title>
</head>
<body>
    <main id="main">
        <div id="menu" class="menu">
            <div class="cotnent_img"><img id="img-menu" src="image/logo_black-removebg-preview.png" alt=""></div>
            <div id="listas_text" class="listas_text">
                <ul>
                    <li onclick="mostrarIframe('asistencia.php')">Asistencia</li>
                    <li onclick="mostrarIframe('clientes.php')">Clientes</li>
                    <li>Elemento3</li>
                </ul>
            </div>
            <div id="listas_icon" class="listas_icon">
                <ul>
                    <li>
                        <i class="bi bi-box"></i>
                        <b>Almacen</b>
                    </li>
                    <li>
                        <i class="bi bi-people"></i>
                        <b>Cientes</b>
                    </li>
                    <li>
                        <i class="bi bi-activity"></i>
                        <b>Rutinas</b>
                    </li>
                </ul>
            </div>
        </div>
        <div class="contenido">
            <div class="header">
                <i id="menu-icon" class="bi bi-list"></i>
                <label for="int_check">
                    <div class="content_data">
                        <img src="https://guide-to-symbols.com/wp-content/uploads/2022/09/circulo.png" alt="">
                        <input type="checkbox" name="my-checkbox" id="int_check" />
                        <p><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Usuario'; ?></p>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                </label>
                <div class="menu_select" id="menu_select">
                    <p>Ajuste</p>
                    <a href="login.php"><?php session_destroy() 
                    ?>Salir</a>
                </div>
            </div>
            
            <iframe id="miIframe" width="100%" height="auto" frameborder="0" ></iframe>
        </div>
    </main>
    <script src="js/menu.js"></script>
    <script>
        function mostrarIframe(url) {
        document.getElementById('miIframe').src = url;
        } 
        
    </script>
</body>
</html>