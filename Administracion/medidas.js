var app = angular.module('App', []);

app.controller('AdminMedidas', function ($scope, $http, $filter) {
    $scope.presentacion = function (valor) {
        $scope.vista = valor;
    };
    $scope.presentacion(true);
    $scope.medidas = {};
    $scope.tipos = 'Agregar';

    $scope.Medidas = function (variable) {
        $http({
            url: '../controles/controles/Get_medidas.php',
            method: "POST",
            data: {'tipo': variable}

        }).then(function (response) {
            console.log(response);
            $scope.Lmedidas = response.data.medidas;

        });

    };
//    $scope.medida = function () {
//        $http({
//            url: '../controles/controles/Get_medida.php',
//            method: "POST",
//            data: {'tipo': 'lista'}
//
//        }).then(function (response) {
//            console.log(response);
//            $scope.medidas = response.data.medidas;
//
//        });
//
//    };
//
//    $scope.medida();

    $scope.Medidas('lista');

    $scope.SeleMedidas = function (idmedida) {

        $scope.registro = $filter('filter')($scope.Lmedidas, {'idarticulo': idmedida});

        $scope.medidas.idmedida = parseInt($scope.registro[0].idmedida);
        $scope.medidas.medida = $scope.registro[0].medida;
      
        $scope.tipos = 'Modificar';
    };

    $scope.ModificarMedidas = function (tipos) {
        $http({
            url: '../controles/controles/Get_medidas.php',
            method: "POST",
            data: {'tipo': tipos, 'valores': $scope.medidas}

        }).then(function (response) {

            console.log(response);
            if(response.data.Lmedidas=="ok"){
                 $scope.Medidas('lista');
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
                $scope.ModificarMedidas($scope.tipos);
                $scope.Medidas('lista');
                $(this).dialog("close");
                return true;
            },
            Close: function () {
                $(this).dialog("close");
            }
        }

    });

    $scope.ABMMedidas = function () {
        switch ($scope.tipos) {
            case 'Agregar':
                $('#message').html("Agrega Medidas ?");
                
                break;

            case 'Modificar':
                $('#message').html("Modifica un MEdidas?");
                 console.log($scope.tipos);
                break;
            case 'Borrar':
                $('#message').html("Esta seguro de Borrar La Medida");
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
