<?php

require_once '../../controles/clases/Articulos.php';

//get the data
$json = file_get_contents("php://input");
$data = json_decode($json);
$tipo = $data->tipo;

switch ($tipo) {
    case 'lista':

        $li = new Articulos();
        $resultado = $li->Lista();
        echo json_encode($resultado);
        break;
     case 'modificar':
       
        $li = new Articulos();
        $resultado = $li->Modificar($data->valores);
        echo json_encode($resultado);
        break;
    
    case 'Agregar':

        $li = new Articulos();
        $resultado = $li->Agregar($data->valores);
        echo json_encode($resultado);
        break;
   case 'Borrar':

        $li = new Articulos();
        $resultado = $li->Borrar($data->valores);
        echo json_encode($resultado);
        break;
}
