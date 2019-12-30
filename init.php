<?php 

define('HOST', 'localhost');
define('USER', 'userapi');
define('PASS', '123456');
define('DBNAME', 'apicoletora');




try { 
    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
   
  } catch (PDOException $error) {
    die ('Erro de Conexão: ' . $error->getMessage());
  }
     
 

function __output_header__( $__success = true, $__message = null, $_dados = array() )
{
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(
        array(
            'success' => $__success,
            'message' => $__message,
            'dados'   => $_dados
        )
    );
    exit;
}