<?php

require_once '../../controles/clases/Clase_Personas.php';

//get the data
$json = file_get_contents("php://input");
$data = json_decode($json);
$tipo = $data->tipo;

switch ($tipo) {
    case 'buscarpersona':

        $li = new personas();
        $resultado = $li->Buscarpersona($data->persona);
        echo json_encode($resultado);
        break;
    case 'Listar':

        $li = new personas();
        $resultado = $li->Listar($data);
        echo json_encode($resultado);
        break;
    case 'cambiomatricula':
        $idpersona = $data->idpersona;
        $matricula = $data->matricula;
        $li = new personas();
        $resultado = $li->CambioMatricula($idpersona, $matricula);
        echo json_encode($resultado);
        break;
    case 'personamatricula':

        $matricula = $data->matricula;
        $li = new personas();
        $resultado = $li->PersonaMatricula($matricula);
        echo json_encode($resultado);
        break;
    case 'DetallePerfilPersonal' :
        $id_abogado = $data->idabogado;
        $li = new Abogado();
        $resultado = $li->DetallePerfilPersonal($id_abogado);
        echo json_encode($resultado);
        break;
      
    case 'AgregarPerfilPersonal' :

        $persona = $data->persona;
        $la = new Personas();
        $resultado = $la->AgregarPerfilPersonal($persona);
        echo json_encode($resultado);
        break;
    
    case 'ModificarPerfilPersonal' :

        $persona = $data->persona;
        $la = new Abogado();
        $resultado = $la->ModificarPerfilPersonal($persona);
        echo json_encode($resultado);
        break;
}
