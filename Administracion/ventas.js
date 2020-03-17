var app = angular.module('App', []);

app.controller('VenAdm', function ($scope, $http) {
   $scope.ventas={};
   $scope.listdesplegablecliente=false;
   $scope.buscarcliente = function(){
      
        $http({
            url: '../controles/controles/Get_ventas.php',
            method: "POST",
            data: {'tipo':'buscarpersona','persona':$scope.clientet}

        }).then(function (response) {
            console.log(response);
            $scope.pep = response.data.personas;
            $scope.listdesplegablecliente=true;

        });
   };
   
      $scope.SelecCliente = function(idpersona){
      $scope.ventas.cliente=idpersona;
      $scope.listdesplegablecliente=false;
      console.log($scope.ventas);
   };
   
   $scope.FacturarAticulos = function(){
     
       
   };
   $scope.SeleArticulo =function (id){
       
   };
   $scope.BuscarArtic =function (){
        $http({
            url: '../controles/controles/Get_ventas.php',
            method: "POST",
            data: {'tipo':'BuscarArticulo','articulo':$scope.articulo}

        }).then(function (response) {
            console.log(response);
            $scope.Larticulos = response.data.articulos;
            $scope.listdesplegablearticulos=true;

        });
   };
   
   
});

