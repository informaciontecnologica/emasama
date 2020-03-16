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
                <h4>Reportes</h4> 
                <?php
//                print_r($_SESSION);
                ?> </div>11111
            <section class="container col-sm-12 col-md-12 col-lg-12" ng-app="App" ng-controller="AdminStock" style="margin-top: 2px;" >
                <div class="row col-12" > 

                </div>
                <div class="row col-12"  > 
                    <div class=" col-6" >
                        <div class="card"style="background-color: #007fff">
                        <label>Buscar</label>
                        <input type="text" class="form-control col-6"ng-model="busqueda" >
                        </div>
                            <div class="col-12">
                                <table class="table" style="margin-top: 5px"  >
                                    <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Medida</th>
                                            <th scope="col">Cantidad</th>
                                             <th scope="col">Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody ng-repeat="x in stock">
                                        <tr ng-click="SeleArticulo(x.idarticulo)">
                                            <td>
                                                {{x.idarticulo}}
                                            </td>
                                            <td>
                                                {{x.descripcion}}
                                            </td>
                                            <td>
                                                {{x.idmedida}}

                                            </td>
                                            <td>
                                                {{x.cantidad}}
                                            </td>
                                             <td>
                                                {{x.precio}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                    </div>
                    <div class=" col-6">
                         <div class="card text-center"style="background-color: #007fff">
                        <label>Gestion de Articulos </label>
                        
                         </div>
                        <div class="col-12">

                            <form   ng-submit="ABMArticulos()">
                                <div class="form-row ">
                                    <div class="form-group col-2 ">  
                                        <label>Id</label>
                                        <input class="form-control" id="idarticulo" ng-model="articulo.idarticulo" type="number" />

                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="form-group col-12 ">  
                                        <label>Descripcion</label>
                                        <input class="form-control" id="descripcion" ng-model="articulo.descripcion"type="text" />
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="form-group col-3 ">  
                                        <label>Cantidad</label>
                                        <input class="form-control" id="cantidad" ng-model="articulo.cantidad"type="number" />
                                    </div>
                                
                                    <div class="form-group col-3 ">  
                                        <label>Medida</label>
                                        <select ng-model="articulo.idmedida" id="idmedida" name="idmedida"  
                                                class="form-control" required 
                                                ng-options="operator.medida for operator  in medidas track by operator.idmedida" >
                                        </select>
                                    </div>
                                
                                    <div class="form-group col-3 ">  
                                        <label>Precio</label>
                                        <input class="form-control" id="cantidad" step="0.50" ng-model="articulo.precio" type="number" />
                                    </div>
                                 </div>
                                <div class="form-row ">
                                    <div class="form-group col-3 ">  
                                        <input class="form-control btn-primary" id="tipo" type="submit" name="boton"  ng-value="tipos"/>
                                    </div>
                                     <div class="form-group col-3 ">  
                                         <input class="form-control btn-primary" id="tipo" type="reset" ng-click="stocks('lista');" name="boton"  ng-value="limpiar"/>
                                    </div>
                                </div>
                               
                            </form>
                           
                        </div>
                    </div>
                </div>

            </section>
        </div>
        <div id="message"></div>

        <?php include '../pie.php'; ?>
    </body>
    <script src="stock.js" type="text/javascript"></script>
</html>