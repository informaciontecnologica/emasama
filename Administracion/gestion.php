
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include'../cabezera.php' ?>
    </head>
    <body>
        <header>
 <?php include'../barra.php' ?>
        </header> 

        <div class="container" style="margin-top: 150px;">


            <?php
            if (!isset($_SESSION['nombre'])) {
                ?>
                <div class="row">
                    <div class="col-sm-2">
                        <h4> Sistema de Gestion Multiplataforma </h4>
                        <?php
            echo $_SESSION['usuario']
                ?>
                    </div>
                    <div class="col-sm-6">
                       

                    </div>
                    <div class="col-sm-2"></div>
                </div>

                <?php
            }
            ?>

            <div id="mensaje"></div>
        </div>

    </body>

</html>