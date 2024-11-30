<?php
session_start(); // Iniciar sesión para almacenar información del usuario

include 'php/db_connection.php'; // Asegúrate de tener este archivo para la conexión a la base de datos

$error = ''; // Inicializar variable de error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre de usuario y la contraseña del formulario
    $username = trim($_POST['user']);
    $password = trim($_POST['pass']);

    // Validar las credenciales
    if (!empty($username) && !empty($password)) {
        try {
            $db = new Database();
            $conn = $db->getConnection();

            // Consulta para obtener el usuario
            $sql = "SELECT * FROM usuario WHERE cuenta = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                // Comprobar la contraseña directamente
                if ($password === $row['clave']) {
                    // Contraseña correcta, establecer la sesión
                    $_SESSION['user_id'] = $row['idUsuario']; // Guardar el ID de usuario
                    $_SESSION['username'] = $row['cuenta']; // Guardar el nombre de usuario

                    // Redirigir a la página de inicio
                    header("Location: menu.php"); // Cambia esto a tu página de destino
                    exit;
                } else {
                    $error = "Contraseña incorrecta.";
                }
            } else {
                // Depuración: El usuario no se encontró
                error_log("Usuario no encontrado: " . $username);
                $error = "Usuario no encontrado.";
            }

        } catch (PDOException $e) {
            $error = "Error de conexión: " . $e->getMessage();
            error_log("Error de conexión: " . $e->getMessage()); // Registro del error
        }
    } else {
        $error = "Por favor, completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Energyn es un negocio que está a la disposición de todos los usuarios de la región de Ica">
    <meta name="author" content="Junior Mendoza">
    <link href="/css/login.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="image/logo.png">
    <title>EnerGym | Login</title>
</head>
<body>
    <main>
        <div class="cuerpo" id="cuerpo">
            <div class="contenedor_reg">
                <div class="fondo">  
                    <img src="image/logo.png" alt="Logo">
                </div>
                <div class="form">
                    <h1>¡Bienvenido!</h1>
                    <form action="" method="POST">
                        <label for="user">Usuario</label>
                        <input type="text" name="user" class="inputs" required>
                        
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass" class="inputs" required>
                        
                        <input type="submit" value="Iniciar sesión" id="btn_enviar">
                    </form>
                    <p>¿Has olvidado tu contraseña? <a href="">Haz clic aquí!</a></p>
                    <?php if (!empty($error)): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
    <!-- <script src="./js/visitas.js"></script> -->
</body>
</html>