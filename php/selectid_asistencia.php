<?php
include 'db_connection.php'; 

$db = new Database(); 
$conn = $db->getConnection(); 

header('Content-Type: application/json'); 

// Obtener el ID de la solicitud POST
$id = isset($_POST['id']) ? $_POST['id'] : null;

try {
    $data = []; // Array para almacenar los resultados

    if ($id !== null) {
        // Preparar la consulta para evitar inyección SQL
        $sql = "SELECT * FROM asistencia WHERE idAsistencia = :id"; 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute(); // Ejecutar la consulta

        // Recuperar los datos
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = [
                'idAsistencia' => $row['idAsistencia'],
                'idCliente' => $row['idCliente'],
                'fechaEntrada' => $row['fechaEntrada'],
                'fechaSalida' => $row['fechaSalida'],
            ];
        }
    }

    // Devolver los datos como JSON, incluso si no hay resultados
    echo json_encode($data);

} catch (PDOException $e) {
    // Manejo de errores
    echo json_encode(['error' => 'Error en la consulta: ' . $e->getMessage()]);
}

// Cerrar la conexión
$db->closeConnection();
?>