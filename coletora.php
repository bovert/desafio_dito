<?php 

require_once 'init.php';
 

if( $_SERVER['REQUEST_METHOD'] !== "POST" )
    __output_header__( false, "Método de requisição não aceito.", null );
 
$json = json_decode(file_get_contents('php://input'));


 

$_dados['event']  = $json->event;
$_dados['timestamp'] = $json->timestamp;

	
$sql = $conn->prepare('INSERT INTO events (event, timestamp) VALUES (:event, :timestamp)');

if($sql->execute(array(
    ':event' => $_dados['event'],
    ':timestamp' => $_dados['timestamp'] ,)))
    {
        $sucesso=true;
    }else {
        $sucesso=false;
    };
   




 
__output_header__(  $sucesso, "Evento registrado com sucesso",$_dados );
 
