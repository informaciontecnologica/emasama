<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include'../cabezera.php' ?>

    </head>
    <body>
        <header>
            <?php include'../barra.php' ?> 


        </header> 

        <div class="container"  style="margin-top: 10px;">
            <div class="card card-heading col-sm-12 col-md-12 col-lg-12 " >
                <h4>Medidas</h4> 
                <?php
//                print_r($_SESSION);
                ?> </div>
            <section class="" ng-app="App" ng-controller="AdminMedidas" style="margin-top: 2px;" >
                <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                    <ul class="nav">
                        <li class="nav-item active">
                            <a class="nav-link" ng-click="presentacion(false);" href="#">Todas<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" ng-click="presentacion(true);" href="#">Gestion</a>
                        </li>
                    </ul>
                </nav>
                <div ng-show="!vista">
                    <div class="card col-sm-12"style="background-color: #007fff">
                        <div class="card-body"
                             <label>Buscar</label>
                            <input type="text" class="form-control  col-sm-12"ng-model="busqueda" >
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-sm " style="margin-top: 5px"  >
                            <thead>
                                <tr >
                                    <th class="col-sm-1">id</th>
                                    <th class="col-sm-2">Medidas</th>
                                    
                                </tr>
                            </thead>
                            <tbody class=""ng-repeat="x in Lmedidas">
                                <tr ng-click="SeleArticulo(x.idmedida)">
                                    <td class="col-sm-2" >
                                        {{x.idmedida}}
                                    </td>
                                    <td class="col-sm-1">
                                        {{x.medida}}
                                    </td>

                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div ng-show="vista">
                    <div class=" col-sm-12">
                        <div class="card text-center col-sm-12"style="background-color: #007fff">
                            <label class="col-sm-12">Gestion de Medidas </label>

                        </div>
                        <div class=" col-sm-12">

                            <form   ng-submit="ABMMedidas()">
                                <div class="form-row ">
                                    <div class="form-group  col-sm-2">  
                                        <label>Id</label>
                                        <input class="form-control" id="idarticulo" readonly="yes" ng-model="medidas.idmedida" type="number" />

                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="form-group  col-sm-12">  
                                        <label>Medidas</label>
                                        <input class="form-control" id="descripcion" ng-model="medidas.medida"type="text" />
                                    </div>
                                </div>
                              
                                <div class="form-row ">
                                    <div class="form-group">  
                                        <input class="form-control btn-primary" id="tipo" type="submit" name="boton"  ng-value="tipos"/>
                                    </div>
                                    <div class="form-group">  
                                        <input class="form-control btn-primary" type="reset" ng-click="Medida('lista');" name="boton"  ng-value="limpiar"/>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </section>
        </div>
        <div id="message"></div>

        <?php // include '../pie.php'; ?>
    </body>
    <script src="medidas.js" type="text/javascript"></script>
</html>