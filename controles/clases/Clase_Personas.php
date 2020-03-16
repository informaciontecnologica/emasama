<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once '../conectores/conexion.php';

class Personas {

    private $id;
    private $nombre;
    private $apellido;
    private $documento;
    private $nacimiento;
    private $direccion;
    private $telefono;
    private $mail;

    public function Listar() {
        $pd = new Conexion();
        $string = "select 
             p.*,u.*,a.idavatar,a.avatar
             FROM personas p LEFT JOIN usuario u on p.idusuario=u.idusuario LEFT JOIN perfil pe on u.id_perfil=pe.id_perfil LEFT join avatar a on 
                p.idpersona=a.idpersona  ORDER BY apellido,nombre";
        $consulta = $pd->prepare($string);

        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("personas" => $rows);

            return $pa;
        }
    }

    public function Buscarpersona($persona) {
        $pd = new Conexion();
        $string = "SELECT * FROM usuarios 
         WHERE nombre LIKE _utf8  '%:persona%' 
         AND apellidos LIKE _utf8  '%:persona%'";
        $consulta = $pd->prepare($string);
        $consulta->bindParam("persona", $string);
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $pa = array("personas" => $rows);

            return $pa;
        }
    }

    public function InsertarPersona($data) {
        $pd = new Conexion();
        $fecha = date("Y-m-d", strtotime($data->nacimiento));
        print_r($data);
        $idperfil = 5;
        $nombre = $data->nombre;
        $apellido = $data->apellido;
        $direccion = $data->direccion;
        $telefono = $data->telefono;
        $nacimiento = $data->nacimiento;
        $documento = $data->documento;
        $idusuario = $data->idusuario;
        $usuario = htmlspecialchars($data->usuario);
        $sexo = $data->sexo;
//Filtro anti-XSS

        $nombre = htmlspecialchars($nombre);
        $apellido = htmlspecialchars($apellido);
        $telefono = htmlspecialchars($telefono);
        $direccion = htmlspecialchars($direccion);
        $documento = htmlspecialchars($documento);

//Escribimos la consulta necesaria
        $consultaUsuarios = "SELECT * FROM `personas` where documento=:documento'";

//Obtenemos los resultados
        $resultadoConsultaUsuarios = $pd->prepare($consultaUsuarios);
        $resultadoConsultaUsuarios->bindParam(":documento", $documento);
        $resultadoConsultaUsuarios->execute();
        $datosConsultaUsuarios = $resultadoConsultaUsuarios->fetch(PDO::FETCH_ASSOC);
        $documento1 = $datosConsultaUsuarios['documento'];
//        if ($documento1 == null) {
//
//           
//            $consulta = "INSERT INTO `personas` (nombre,apellido,nacimiento,mail,telefono,direccion,documento,sexo,idusuario)
//         	VALUES (:nombre,:apellido,:nacimiento,:mail,:telefono,:direccion,:documento,:sexo,:idusuario)";
//            $ree = $pd->prepare($consulta);
//            $ree->bindParam(":nombre", $nombre);
//            $ree->bindParam(":apellido", $apellido);
//            $ree->bindParam(":nacimiento", $fecha);
//            $ree->bindParam(":mail", $usuario);
//            $ree->bindParam(":telefono", $telefono);
//            $ree->bindParam(":direccion", $direccion);
//            $ree->bindParam(":documento", $documento);
//            $ree->bindParam(":sexo", $sexo);
//            $ree->bindParam(":idusuario", $idusuario);
//            $ree->execute();
//        } else {
//            echo "no es mayor";
//        }
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getNacimiento() {
        return $this->nacimiento;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getMail() {
        return $this->mail;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setNacimiento($nacimiento) {
        $this->nacimiento = $nacimiento;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

}
