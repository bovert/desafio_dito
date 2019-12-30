<?php
require_once 'init.php';

$event = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);


$sql_events= "SELECT DISTINCT event FROM events WHERE event LIKE '%".$event."%' ORDER BY event ASC LIMIT 7";


$resultado_events = $conn->prepare($sql_events);
$resultado_events->execute();

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row_events['event'];
}

echo json_encode($data);