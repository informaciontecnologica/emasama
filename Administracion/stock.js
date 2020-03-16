var app = angular.module('App', []);

app.controller('AdminStock', function ($scope, $http, $filter) {
    $scope.presentacion = function (valor) {
        $scope.vista = valor;
    };
    $scope.presentacion(true);
    $scope.articulo = {};
    $scope.tipos = 'Agregar';

    $scope.stocks = function (variable) {
        $http({
            url: '../controles/controles/Get_stock.php',
            method: "POST",
            data: {'tipo': variable}

        }).then(function (response) {
            console.log(response);
            $scope.stock = response.data.stock;

        });

    };
    $scope.medida = function () {
        $http({
            url: '../controles/controles/Get_medida.php',
            method: "POST",
            data: {'tipo': 'lista'}

        }).then(function (response) {
            console.log(response);
            $scope.medidas = response.data.medidas;

        });

    };

    $scope.medida();

    $scope.stocks('lista');

    $scope.SeleArticulo = function (idarticulo) {

        $scope.registro = $filter('filter')($scope.stock, {'idarticulo': idarticulo});

        $scope.articulo.idarticulo = parseInt($scope.registro[0].idarticulo);
        $scope.articulo.descripcion = $scope.registro[0].descripcion;
        $scope.articulo.cantidad = parseInt($scope.registro[0].cantidad);
        $scope.articulo.idmedida = {idmedida: $scope.registro[0].idmedida};
        $scope.articulo.precio = parseFloat($scope.registro[0].precio);
        $scope.tipos = 'Modificar';
    };

    $scope.ModificarArticulo = function (tipos) {
        $http({
            url: '../controles/controles/Get_stock.php',
            method: "POST",
            data: {'tipo': tipos, 'valores': $scope.articulo}

        }).then(function (response) {

            console.log(response);
            if(response.data.stock=="ok"){
                 $scope.stocks('lista');
            }
            
        });
    };
    var z = $('#message').dialog({
        autoOpen: false,
        resizable: false,
        height: "200",
        width: "400",
        modal: false,
        buttons: {
            Aceptar: function () {
                $scope.ModificarArticulo($scope.tipos);
                $scope.stocks('lista');
                $(this).dialog("close");
                return true;
            },
            Close: function () {
                $(this).dialog("close");
            }
        }

    });

    $scope.ABMArticulos = function () {
        switch ($scope.tipos) {
            case 'Agregar':
                $('#message').html("Agrega Articulo ?");
                
                break;

            case 'Modificar':
                $('#message').html("Modifica un Articulo ?");
                 console.log($scope.tipos);
                break;
            case 'Borrar':
                $('#message').html("Esta seguro de Borrar el Articulo");
                break;


        }

        z.dialog("open");
    };

});
$(document).ready(function () {


//    $("#ABMArticulos").on("submit", function (e) {
//        //Evitamos que se envíe por defecto
//        e.preventDefault();
//        //Creamos un FormData con los datos del mismo formulario
//
//        if ($('#tipo').val() == 'Agregar') {
//            $('#message').html("Agrega Evento ?");
//
//        } else {
//            $('#message').html("Modifica un evento ?");
//        }
//        z.dialog("open");
//    });
//
//
//    function Agregar() {
//
////        if ($('input:checkbox[name=publicar]:checked').val()) {
////            formData.append("publicar", 1);
////        } else
////        {
////            formData.append("publicar", 0);
////        } +'-'+$("#idpathold").val()+'-'+$("#idpathold").val()
//
//        var data = {};
//        data = {
//            'idarticulo': $('#idarticulo').val(),
//            'descripcion': $('#descripcion').val(),
//            'cantidad': $('#cantidad').val(),
//            'tipo': $('#tipo').val(),
//            'idmedida': $('#idmedida').val()
//        };
//        data = JSON.stringify(data);
//        console.log(data);
//        //Llamamos a la función AJAX de jQuery       
//        $.ajax({
//            //Definimos la URL del archivo al cual vamos a enviar los datos
//            url: "../controles/controles/Get_stock.php",
//            //Definimos el tipo de método de envío
//            type: "POST",
//            //Definimos el tipo de datos que vamos a enviar y recibir
//            dataType: "json",
//            //Definimos la información que vamos a enviar
//            data: data,
//            //Deshabilitamos el caché
//            cache: false,
//            //No especificamos el contentType
//            contentType: 'text/html',
//            //No permitimos que los datos pasen como un objeto
//            processData: false,
//            success: function (response) {
//                var arr = JSON.stringify(response);
//                console.log("Estado:" + response);
////                if (response.Estado == "ok") {
////                    location.reload();
////                }
//
//            },
//            error: (function (error) {
//                var arr = JSON.stringify(error);
//                console.log("error :" + arr);
//            })
////                        .done(function (response) {
////                var arr = JSON.stringify(response);
////                        ;
////                        console.log("echo:" + arr);
//////            var content = $(data).find("#content");
//////            $("#result").empty().append(content);
//        });
//    }
//    ;
});
