<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <?php
        include 'cabezera.php';
        ?>


    </head>
    <body >

        <?php
        include 'controles/conectores/conexion.php';
        $op = new Conexion();
        ?>

        <nav class="navbar navbar-dark bg-primary navbar-expand-sm bg- fixed-top">

            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link" href="#">EMASAM</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" 
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Productos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Maiz</a>
                        <a class="dropdown-item" href="#">Sorgo</a>
                        <a class="dropdown-item" href="#">Alfalfa</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Servicios</a>
                </li>

            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="vistas/registrarse.php"><span class="glyphicon glyphicon-user"></span>Registrar</a></li>
                <li class="nav-item"><a class="nav-link" href="vistas/ingresar.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
            </ul>
        </nav>

        <div class="container" style="margin-top: 150px;">
            <section  >
                <div class="row">
                    <div class="col-6 ">
                        <div >
                            <h3 class="lead">Forrageria de EmaSam</h3>
                            <h3>Productos</h3>
                            <p>

                            </p>

                        </div>
                    </div>
                    <div class="col-6 ">

                        <div id="myCarousel" class="carousel slide text-center " data-ride="carousel" style="margin-top: 10px;" >


                            <ul class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ul>


                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="imagenes/portal/logo.jpg" alt="Chicago" class="d-block img-fluid">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>El arisco</h5>
                                        <p>Potraso</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="imagenes/alfalfa.jpg" alt="Alfalfa" class="d-block img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="imagenes/maiz_qeubrado.jpg" alt="Maiz quebrado" class="d-block img-fluid">
                                </div>
                            </div>


                            <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>

                    </div>

                    <div class="col-md-3  col-sm-6 col-sx-12">

                    </div>

                    <div class="col-md-3  col-sm-6 col-sx-12"></div>
            </section >
            <section  class="col-md-12  col-sx-12 portal-cuerpo">



            </section>

        </div>
<!--<script language="JavaScript" for="window" event="onload">
xmlDoc = new ActiveXObject("Microsoft.XMLDOM")
xmlDoc.async="true"
xmlDoc.load("http://www.perfil.com/rss/tecnologia.xml")
raiz = xmlDoc.documentElement

textoXml.innerText = xmlDoc.xml
</script>
y esto en alguna parte de tu documento
<div id="textXml"></div>-->
        <?php
        $path = "http://www.perfil.com/rss/tecnologia.xml";
//        include 'http://www.perfil.com/rss/tecnologia.xml';
//
////read entire file into string
//$xmlfile = file_get_contents($path);
//
////convert xml string into an object
//$xml = simplexml_load_string($xmlfile);
//
////convert into json
//$json  = json_encode($xml);
//
////convert into associative array
//$xmlArr = json_decode($json, true);
//print_r($xmlArr);
//        include 'pie.php';
        ?>

        <div onload ="getRSS('contenidoRSS');">
            <div id="contenidoRSS"></div>
        </div>

    </body>



</html>
