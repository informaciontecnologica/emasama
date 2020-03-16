<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

/* Establecemos que las paginas no pueden ser cacheadas */
header("Expires: Tue, 01 Jul 2022 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
date_default_timezone_set('America/Argentina/Buenos_Aires');

function logOut() {
    session_unset();
    session_destroy();
    session_start();
    session_regenerate_id(true);
}

$titulo = "Emanuel Colcomet Forrajes";
$logo = "";
echo "
 <meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
        
       <TITLE>$titulo</TITLE>

<META NAME=\"DC.Language\" SCHEME=\"RFC1766\" CONTENT=\"Spanish\">
<META NAME=\"AUTHOR\" CONTENT=\"jorge daniel castro\">
<META NAME=\"REPLY-TO\" CONTENT=\"info@informaciontecn.com.ar\">
<LINK REV=\"made\" href=\"mailto:info@informaciontecn.com.ar\">
<META NAME=\"DESCRIPTION\" CONTENT=\"sitio Forrajes de Emasama Formosa, Argentina.\">
<META NAME=\"KEYWORDS\" CONTENT=\"forraje, alfalfa, formosa, maiz,maíz, alimento, balanceado, potros, caballos, hipodromo\">
<META NAME=\"Resource-type\" CONTENT=\"Homepage\">
<META NAME=\"DateCreated\" CONTENT=\"Sun, 26 de febrero de  2020 00:00:00 GMT-3\">
<META NAME=\"Revisit-after\" CONTENT=\"20 days\">
<META NAME=\"robots\" content=\"ALL\">   ";
   


 echo " 
              <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\">
              <link rel=\"stylesheet\" href=\"http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css\" />
              <script src=\"http://code.jquery.com/jquery-1.9.1.js\"></script>
              <script src=\"http://code.jquery.com/ui/1.10.1/jquery-ui.js\"></script>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\"></script>
        <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\"></script>
       

";
 echo "<script src=\"https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js\"></script>" ;