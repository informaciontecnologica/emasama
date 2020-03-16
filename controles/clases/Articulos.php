<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Articulos
 *
 * @author daniel
 */
require_once '../conectores/conexion.php';

class Articulos {

    //put your code here
    private $idarticulo, $descripcion, $cantidad, $idmedida;

    public function Lista() {
        $pd = new Conexion();
        $string = "select * from stock";
        $consulta = $pd->prepare($string);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("stock" => $rows);

            return $pa;
        }
    }

    public function Modificar($data) {
        $pd = new Conexion();
        $string = "update stock set descripcion=:descripcion , cantidad=:cantidad ,idmedida=:idmedida ,precio=:precio where idarticulo=:idarticulo";
        $consulta = $pd->prepare($string);

        $consulta->bindParam(":descripcion", $data->descripcion);
        $consulta->bindParam(":cantidad", $data->cantidad);
        $consulta->bindParam(":idmedida", $data->idmedida->idmedida);
        $consulta->bindParam(":precio", $data->precio);
        $consulta->bindParam(":idarticulo", $data->idarticulo);
        $consulta->execute();
        if ($consulta) {
            $pa = array("stock" => "ok");
            return $pa;
        }
    }
     public function Agregar($data) {
        $pd = new Conexion();
        $string = "insert into stock  (descripcion , cantidad,idmedida,precio) values (:descripcion , :cantidad ,:idmedida,:precio)   ";
        $consulta = $pd->prepare($string);

        $consulta->bindParam(":descripcion", $data->descripcion);
        $consulta->bindParam(":cantidad", $data->cantidad);
        $consulta->bindParam(":idmedida", $data->idmedida->idmedida);
        $consulta->bindParam(":precio", $data->precio);

        $consulta->execute();
        if ($consulta) {
            $pa = array("stock" => "ok");
            return $pa;
        }
    }
    
     public function Borrar($data) {
        $pd = new Conexion();
        $string = "Delete from  stock   where idarticulo=:idarticulo ";
        $consulta = $pd->prepare($string);

        $consulta->bindParam(":idarticulo", $data->idarticulo);
        $consulta->execute();
        if ($consulta) {
            $pa = array("stock" => "ok");
            return $pa;
        }
     }
     
    function getIdarticulo() {
        return $this->idarticulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getidMedida() {
        return $this->idmedida;
    }

    function setIdarticulo($idarticulo) {
        $this->idarticulo = $idarticulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setidMedida($idmedida) {
        $this->idmedida = $idmedida;
    }

}
