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
                <h4>Stock </h4> 
                <?php
//                print_r($_SESSION);
                ?> </div>
            <section class="" ng-app="App" ng-controller="AdminStock" style="margin-top: 2px;" >
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
 <ul class="nav">
      <li class="nav-item active">
          <a class="nav-link" ng-click="presentacion(false);" href="#">Articulos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" ng-click="presentacion(true);" href="#">Formulario</a>
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
                                <th class="col-sm-2">Descripcion</th>
                                <th class="col-sm-1">Med</th>
                                <th class="col-sm-1">Cant</th>
                                <th class="col-sm-2">Precio</th>
                            </tr>
                        </thead>
                        <tbody class=""ng-repeat="x in stock">
                            <tr ng-click="SeleArticulo(x.idarticulo)">
                                <td class="col-sm-2" >
                                    {{x.idarticulo}}
                                </td>
                                <td class="col-sm-1">
                                    {{x.descripcion}}
                                </td>
                                <td class="col-sm-1">
                                    {{x.idmedida}}

                                </td>
                                <td class="col-sm-1">
                                    {{x.cantidad}}
                                </td>
                                <td class="col-sm-1">
                                    {{x.precio}}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                </div>
                <div ng-show="vista">
                    <div class=" col-sm-12">
                        <div class="card text-center col-sm-12"style="background-color: #007fff">
                            <label class="col-sm-12">Gestion de Articulos </label>

                        </div>
                        <div class=" col-sm-12">

                            <form   ng-submit="ABMArticulos()">
                                <div class="form-row ">
                                    <div class="form-group  col-sm-2">  
                                        <label>Id</label>
                                        <input class="form-control" id="idarticulo" readonly="yes" ng-model="articulo.idarticulo" type="number" />

                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="form-group  col-sm-12">  
                                        <label>Descripcion</label>
                                        <input class="form-control" id="descripcion" ng-model="articulo.descripcion"type="text" />
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="form-group  ">  
                                        <label>Cantidad</label>
                                        <input class="form-control" id="cantidad" ng-model="articulo.cantidad"type="number" />
                                    </div>

                                    <div class="form-group  ">  
                                        <label>Medida</label>
                                        <select ng-model="articulo.idmedida" id="idmedida" name="idmedida"  
                                                class="form-control" required 
                                                ng-options="operator.medida for operator  in medidas track by operator.idmedida" >
                                        </select>
                                    </div>

                                    <div class="form-group  ">  
                                        <label>Precio</label>
                                        <input class="form-control" id="precio" step="0.50" ng-model="articulo.precio" type="number" />
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="form-group">  
                                        <input class="form-control btn-primary" id="tipo" type="submit" name="boton"  ng-value="tipos"/>
                                    </div>
                                    <div class="form-group">  
                                        <input class="form-control btn-primary" type="reset" ng-click="stocks('lista');" name="boton"  ng-value="limpiar"/>
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
    <script src="stock.js" type="text/javascript"></script>
</html>