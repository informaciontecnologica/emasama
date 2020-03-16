<?php

/**
 * Description of Articulos
 *
 * @author daniel
 */
require_once '../conectores/conexion.php';

class Medidas {

    //put your code here
    private $idmedida, $medida;

    public function Lista() {
        $pd = new Conexion();
        $string = "select * from medidas";
        $consulta = $pd->prepare($string);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("medidas" => $rows);

            return $pa;
        }
    }

    public function Agregar($data) {
        $pd = new Conexion();
        $string = "insert into medidas (medida) values (:medida)   ";
        $consulta = $pd->prepare($string);
        $consulta->bindParam(":medida", $data->medida);
        $consulta->execute();
      
        if ($consulta) {
            $pa = array("Lmedidas" =>"ok");
            return $pa;
        }
    }

    function getIdmedida() {
        return $this->idmedida;
    }

    function getMedida() {
        return $this->medida;
    }

    function setIdmedida($idmedida) {
        $this->idmedida = $idmedida;
    }

    function setMedida($medida) {
        $this->medida = $medida;
    }



}
