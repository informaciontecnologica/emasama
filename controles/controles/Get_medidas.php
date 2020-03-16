<?php

require_once '../clases/Medidas.php';

//get the data
$json = file_get_contents("php://input");
$data = json_decode($json);
$tipo = $data->tipo;

switch ($tipo) {
    case 'lista':

        $li = new Medidas();
        $resultado = $li->Lista();
        echo json_encode($resultado);
        break;
    
    case 'Agregar':

        $li = new Medidas();
        $resultado = $li->Agregar($data->valores);
        echo json_encode($resultado);
        break;
    

}
