<?php
include 'db_connection.php';

$db = new Database();
$conn = $db->getConnection();

header('Content-Type: application/json'); // Especificar que se devuelve JSON

$sql = "SELECT a.idAsistencia,
    CONCAT(pcl.nombre, ' ' + pcl.apellidoPat, ecl.razonSocial) AS nombreCliente,  
    CONCAT(pusu.nombre, ' ' + pusu.apellidoPat) AS nombreUsuario,   
    a.fechaEntrada, 
    a.fechaSalida, 
    a.estado   
FROM asistencia a
INNER JOIN cliente c ON a.idCliente = c.idCliente
FULL JOIN persona pcl ON c.idPersona = pcl.idPersona
FULL JOIN empresa ecl ON c.idEmpresa = ecl.idEmpresa 
INNER JOIN usuario u ON a.idUsuario = u.idUsuario
INNER JOIN empleado e ON u.idEmpleado = e.idEmpleado
INNER JOIN persona pusu ON e.idPersona = pusu.idPersona";

try {
    $stmt = $conn->query($sql);
    $data = []; // Array para almacenar los resultados

    foreach ($stmt as $row) {
        $data[] = [
            'idAsistencia' => $row['idAsistencia'],
            'idCLiente' => $row['nombreCliente'],
            'idUsuario' => $row['nombreUsuario'],
            'fechaEntrada' => $row['fechaEntrada'],
            'fechaSalida' => $row['fechaSalida'],
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