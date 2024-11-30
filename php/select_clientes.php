<?php
include 'db_connection.php';

$db = new Database();
$conn = $db->getConnection();

header('Content-Type: application/json'); // Especificar que se devuelve JSON

$sql = "SELECT cl.idCliente,
    CONCAT(pcl.nombre, ' ' + pcl.apellidoPat, ecl.razonSocial) AS nombreCliente,  
    cl.peso, 
    cl.estatura, 
    CASE 
        WHEN cl.estado = '1' THEN 'Activo' 
        ELSE 'Inactivo' 
    END AS estado 
FROM cliente cl
FULL JOIN persona pcl ON cl.idPersona = pcl.idPersona
FULL JOIN empresa ecl ON cl.idEmpresa = ecl.idEmpresa";

try {
    $stmt = $conn->query($sql);
    $data = []; // Array para almacenar los resultados

    foreach ($stmt as $row) {
        $data[] = [
            'idCliente' => $row['idCliente'],
            'nombreCliente' => $row['nombreCliente'],
            'peso' => $row['peso'],
            'estatura' => $row['estatura'],
            'estado' => $row['estado'],
        ];
    }

    // Devolver los datos como JSON
    echo json_encode($data);

} catch (PDOException $e) {
    // Manejo de errores
    echo json_encode(['error' => 'Error en la consulta: ' . $e->getMessage()]);
}

// Cerrar la conexión
$db->closeConnection();
?>