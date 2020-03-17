<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include'../cabezera.php' ?>

    </head>
    <body>
        <header>
            <?php include'../barra.php' ?> 


        </header> 

        <div class="" ng-app="App" ng-controller="VenAdm" style="margin-top: 2px;" >
            <form   ng-submit="FacturarAticulos()">
                <div class="card card-heading col-sm-12 col-md-12 col-lg-12 " >
                    <div class="row col-sm-12"> 
                        <div class="col-sm-6">
                            <h4>Ventas</h4> 
                        </div>
                        <div class="row col-sm-12 "> 
                            <div class="col-sm-3 ">
                                <label>N° Factura : </label>
                                <div class="" >{{nfactura}}</div>
                            </div>
                            <div class="col-sm-3 ">
                                <label>Fecha :</label>
                                <div class="" >
                                    <input type="date" id="fecha" ng-model="fecha"
                                           value="<?php echo date("Y-m-d") ?>" />
                                </div>
                            </div>
                            <div class="col-sm-3 ">
                                <label>Hora:</label>
                                <div class="" >
                                    <input type="time" id="hora"  ng-model="hora"
                                           value="<?php echo date("H:i:s", time()) ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row col-sm-12">
                    <div class=" form-group col-sm-5" >
                        <label class="col-sm-3 "for="cliente">Cliente  </label> 
                        <input class="form-control col-sm-12"
                               ng-model="clientet" ng-change="buscarcliente();"
                               type="text" placeholder="Buscar cliente"  />
                    </div>

                    <div class=" form-group col-sm-6" >
                        <label class=" "for="cliente">Forma de Pago </label> 
                        <select class="form-group form-control col-sm-12" ng-model="formapago" >
                            <option>Contado</option>
                            <option>Tarjeta</option>
                            <option>Debito</option>
                        </select>

                    </div>
                </div> 
                <div class="col-sm-5" style="z-index: 2; background-color:  #20c997" ng-repeat="x in pep" ng-show="listdesplegablecliente" >
                    <div ng-click="SelecCliente(x);"> {{x.nombre +", "+ x.apellido +", Dni: "+ x.documento}} </div> 
                </div>

                <section class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 2px;" >

                    <div class="row col-sm-12"  > 

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
                    <div class=" col-sm-12 " style="background-color: #007fff">
                        <h6>Articulos </h6>
                        <div class="form-inline form-group" >

                            <input class="form-control col-3" placeholder="Buscar Articulos" type="text" ng-change="BuscarArtic();" ng-model="articulo" />

                        </div>
                        <div class="col-sm-12">


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col-sm-1">id</th>
                                        <th scope="co-sm-1l">Descripcion</th>
                                        <th scope="col-sm-1">Medida</th>
                                        <th scope="col-sm-1">Total</th>
                                        <th scope="col-sm-1">Cantidad</th>
                                        <th scope="col-sm-1">Precio</th>
                                        <th scope="col-sm-1">Bonificacion</th>
                                        <th scope="col-sm-1">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{id}}
                                        </td>
                                        <td>
                                            {{descripcion}}
                                        </td>
                                        <td>
                                            {{idmedida}}

                                        </td>
                                        <td>
                                            {{cantidad}}
                                        </td>
                                        <td>
                                            <input class="form-control col-sm-3" placeholder="Cantidad" type="text" ng-model="cantidad" />

                                        </td>
                                        <td>
                                            {{precio}}
                                        </td>  
                                        <td>
                                            <input class="form-control col-sm-3" placeholder="Bonificación %" type="text" ng-model="bonificacion" />

                                        </td>
                                        <td>
                                            {{importe}}
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><div class="" >Importe Total <span>$ 123.2312</span> </div></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="form-row ">
                                <div class="form-group col-sm-3 ">  
                                    <input class="form-control "  type="submit" name="boton"  ng-value="tipos"/>
                                </div>
                                <div class="form-group col-sm-3 ">  
                                    <input class="form-control "  type="reset" ng-click="stocks('lista');" name="boton"  ng-value="limpiar"/>
                                </div>
                            </div>



                        </div>
                    </div> 
                </section>
            </form>


        </div>
        <div id="message"></div>

        <?php include '../pie.php'; ?>
        </div>
    </body>
    <script src="ventas.js" type="text/javascript"></script>
</html>