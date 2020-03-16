<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include'../cabezera.php';
        ?>


    </head>
    <body ng-app="App" ng-controller="perfil" >

        <header>
            <?php include '../barra.php'; ?> 
        </header> 

        <div class="container" style="margin-top: 40px;">
//                tipoperfil =<?php // echo $_SESSION['perfil']; ?>; 
//                idusuario = <?php // echo htmlspecialchars(json_encode($_SESSION['idusuario'])) ?>;
            <div  ng-init="

                 persona.usuario = <?php echo htmlspecialchars(json_encode($_SESSION['usuario'])) ?>;
                registro = <?php echo htmlspecialchars(json_encode($_SESSION['nombre'])) ?>; 
                userInit( '<?php echo $_SESSION['idpersona'] ?>')" 
                  class="row " >
                <div  class="card bg-primary col-12" >
                    <div class="card-heading">
                        <h4 class="text-white card-title">Datos Personales</h4>
                        <a class="text-white card-link" href="#">Perfil</a>
                        <a class="text-white card-link" href="password.php" >Password</a> 
                        <a class="text-white card-link" href="ayuda.php?tag=perfil" class="glyphicon glyphicon-question-sign"></a>
                        <a class="text-white card-link" href="#" > ID:<?php echo $_SESSION['idpersona'] ?></a>
                    </div>

                </div>
            </div>
            <div class="row">
                <form class="col-12" role="form" id="perfilpersonal" ng-show="perfil"  ng-submit="formulariopersonal()" >

                    <div class="form-row">  
                        <div class="form-group  col-md-5">  
                            <label for="apellido">Apellido</label>
                            <input class="form-control" class="form-control" ng-model="persona.apellido"type="text" requi                                                               red name="apellido" value="bbbbb                                                               bb" /                                                               >
                    </div>
                    <div class="form-group col-md-5 ">  
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" ng-model="persona.nombre" required  name="nombre" />
                    </div>

                    <div class="form-group col-md-2"> 
                        <label for="documento">Documento</label>
                        <input  class="form-control" type="count" ng-model="persona.documento" name="documento" required value="" />
                    </div>
                </div>
                <div class="form-row ">
                    <div class="form-group col-md-3">  
                        <label class="text-center">Sexo</label>
                        <div class="form-inline">

                            <div class="form-check col-md-6"> 
                                <input class="form-check-input" type="radio" name="sexo" ng-model="persona.sexo" required id="exampleRadios1" value="M" checked/>
                                <label class="form-check-label" for="exampleRadios1">
                                    Masculino                                                        
                                </label>
                            </div>
                            <div class="form-check  col-md-6">
                                <input class="form-check-input" type="radio" name="sexo" required ng-model="persona.sexo" id="exampleRadios2" value="F"/>
                                <label class="form-check-label" for="exampleRadios2">Femenino
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="form-group  col-md-3">  
                        <label>Telefono Particular</label>
                        <input class="form-control" type="text" name="telefonoparticular" required ng-model="persona.telefono" />
                    </div>

                    <div class="form-group col-md-3"> 
                        <label for="Fecha">Nacimiento</label>
                        <input  class="form-control" type="date" ng-model="persona.nacimiento" required name="nacimiento" value="" />
                    </div>
                </div>
                    <div class="form-row ">
                        <div class="form-group col-12 ">  
                            <label>Dirección Particular</label>
                            <input  class="form-control"type="text" name="direccionparticular" required ng-model="persona.direccion" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-3">  
                            <label>Barrio</label>
                            <input class="form-control" type="text" name="barrio" required ng-model="persona.barrio" />
                        </div>
                        <div class="form-group col-3">  
                            <label>Provincia</label>
                            <input class="form-control" type="text" name="provincia" required ng-model="persona.provincia" />
                        </div>
                        <div class="form-group col-3">  
                            <label>Ciudad</label>
                            <input class="form-control" type="text" name="ciudad" required ng-model="persona.ciudad" />
                        </div>

                    </div>



<!--                    <div  class="panel panel-success"> 
                        <div class="panel-heading">Titulos</div> 
                        <div class="panel-body">
                            <div class="form-row">

                                <div class="form-group col-md-5">  
                                    <label>Mail Trabajo</label>
                                    <input class="form-control" type="mail" name="observaciones" required ng-model="abogado.mailtrabajo"/>

                                </div>  
                                <div class="form-group col-md-5">  
                                    <label>Direccion Oficina</label>
                                    <input class="form-control" type="text" name="observaciones" required ng-model="abogado.direccionoficina"/>

                                </div>
                                <div class="form-group col-md-2">  
                                    <label>Telefono Oficina</label>
                                    <input class="form-control" type="tel" name="observaciones" required ng-model="abogado.teleoficina"/>
                                </div>

                            </div>  

                        </div>  
                    </div>-->



                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="idpersona" id="idpersona" value="<?php echo $_SESSION['idpersona']; ?>"/>
                           <input type="hidden" name="usuario" id="usuario" ng-model="usuario" ng-value="<?php echo htmlspecialchars(json_encode($_SESSION['usuario']))?>"/>
                            <input type="hidden" name="idperfil" id="idperfil" ng-model="idperfil" ng-value="<?php echo $_SESSION['perfil'] ?>"/>
                            
                            <input class="btn btn-primary pull-right" type="submit"  ng-value="estadoform" />
                        </div>
                    </div>

            </form>
        </div>

    </div>


    <?php
    if (isset($idpersona)) {
        include '../controles/clases/Avatar.php';
        $fo = new Avatar();
        $foto = $fo->GetFoto($idpersona);
    }
    ?>
    <!--    <div class="panel panel-info">
            <div class="panel-heading">Foto </div>
            <div >
                <img  class="avatar" id="previewing"   src="../imagenes/perfil/avatar/<?php echo $foto ?>"></img></div>
    
    
    
            <input type="hidden" name="idpersona" value="<?php echo $_SESSION['idpersona'] ?>" />
        </div>
        <div class="form-group">  
            <div class="col-md-6 col-xs-6">
                <input type="hidden" value="<?php echo $foto ?>"  id="file_oculto" />
                <input type="file" value="<?php echo $foto ?>" name="file" id="file" />
            </div>
    
        </div>-->



    <div id="message"></div>

    <?php include '../pie.php'; ?> 
</body>
<script src="../js/perfil.js" type="text/javascript"></script>
</html>