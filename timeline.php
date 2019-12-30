<?php 
 $site_url = 'https://storage.googleapis.com/dito-questions/events.json';
 $info = file_get_contents($site_url);
 $lendo = json_decode($info);
 header('Content-Type: application/json'); 



foreach ($lendo->events as $event){
 
   if ($event->event == "comprou"){
       foreach ($event->custom_data as $data){
               
            if($data->key=="transaction_id"){
            $evento["transaction_id"]=$data->value;
            $evento["timestamp"]=$event->timestamp;
            $evento["revenue"]=$event->revenue;
            }
            if($data->key=="store_name"){
                $evento["store_name"]=$data->value;
            }

       
      
      

        }
     $eventos[]=$evento;
     
    }

     
   if ($event->event == "comprou-produto"){

        foreach ($event->custom_data as $data){

            if($data->key=="transaction_id"){
            $produto["transaction_id"]=$data->value;
            }elseif($data->key=="product_name"){
            $produto["product_name"]=$data->value;
            }
            elseif($data->key=="product_price"){
            $produto["product_price"]=$data->value;
            }

        }
     $produtos[]=$produto;
     }
     
}

function compararTimestamps($a, $b)
					{
						return ($a['timestamp']<$b['timestamp']);
					}

usort($eventos, 'compararTimeStamps');

foreach ($eventos as $key=>$evento){
 
    foreach ($produtos as $produto){
        if ($produto[transaction_id]==$evento[transaction_id]){
            $eventos[$key]["products"][]["Name"]=$produto["product_name"];
            $eventos[$key]["products"][]["Price"]=$produto["product_price"];
        }
    }
}

$timeline["timeline"]=$eventos;
echo(json_encode($timeline,JSON_UNESCAPED_UNICODE));






