
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

        <div class="container" >


            <?php
            if (!isset($_SESSION['nombre'])) {
                ?>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6" style="margin-top: 150px;">
                        <form action="../controles/controles/sess.php" method="post">
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input class="form-control" type="mail" ng-model="mail" name="mail" required  maxlength="45" autofocus/>

                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input  class="form-control" type="password" ng-model="password" required  name="password" />
                            </div>
                            <div class="form-group">

                                <a href="claveperdio.php">Perdio su Clave?</a>
                            </div>
                            <div class="form-group">  

                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-sm-2"></div>
                </div>

                <?php
            }
            ?>

            <div id="mensaje"></div>
        </div>

    </body>
    <script>
        function cerrar(){
        <?php session_destroy(); ?>
        }
    </script>
</html>