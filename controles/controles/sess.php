<?php

session_start();
include '../conectores/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ((isset($_POST['mail'])) and ( isset($_POST['password'])) and ( $_POST['password'] != '') and ( $_POST['mail'] != '')) {
        $password =md5($_POST['password']);
        $mail = $_POST['mail'];
        $pdo = new Conexion();
        $consulta = $pdo->prepare("Select * from usuario  where mail=:mail and clave=:clave");
        $consulta->bindparam(':mail', $mail);
        $consulta->bindparam(':clave', $password);
        $consulta->execute();
 
        if ($consulta->rowCount() > 0) {
            
            while ($resultados = $consulta->fetch()) {
                $_SESSION['usuario'] = $resultados['mail'];
                $_SESSION['idusuario'] = $resultados['idusuario'];
                $_SESSION['mail'] = $resultados['mail'];
                $_SESSION['perfil'] = $resultados['idperfil'];
//              $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['SKey'] = uniqid(mt_rand(), true);
                $_SESSION['start'] = time(); // Taking now logged in time.
//////         // Ending a session in 30 minutes from the starting time.
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
//              $_SESSION['LastActivity'] = $_SERVER['REQUEST_TIME'];
//              $ip = !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
//              $_SESSION['IPaddress'] = $ip;

                $Consultaper = $pdo->prepare("select p.* from personas p   where idusuario=:idusuario");
                $Consultaper->bindparam(':idusuario', $_SESSION['idusuario']);
                $registro=$Consultaper->execute();

                $_SESSION['contando'] = $Consultaper->rowCount();
                
                if ($Consultaper->rowCount()>0) {
                    $Regpersonas = $Consultaper->fetch();
                   
                    
                    if($Regpersonas['idpersona']==null){
                         $_SESSION['idpersona'] = "noidpersona";
                         header("location: ../../vistas/perfil.php");
                        exit;
                    } else {
                    $_SESSION['idpersona'] =$Regpersonas['idpersona'];
                    $_SESSION['admin'] = "ok";
                    
                     header("location:../../Administracion/gestion.php");
                    }
          
                } else {
                    $_SESSION['nombre'] = "nonombre";
                    $_SESSION['idpersona'] = "noidpersona";
//                    header("location:/index.php");
                    exit;
                }
            }
        } else {
            header("location: ../vistas/errorsession.php");
            exit;
        }
        mysql_free_result($seleccion);
    }
} 
  