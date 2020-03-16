/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module('App', []);

app.controller('perfil', function ($scope, $http) {
    $scope.perfil = false;


    $scope.cambios = function () {

        switch ($scope.tipoperfil) {
            case 3:
                $scope.unive();
                $scope.PantallaTitulo = '1';
                break;
        }
    };

    $scope.nacio = function () {
        $http({
            url: '../controles/controles/Get_perfil.php',
            method: "POST",
            data: {"tipo": "pais"}

        }).then(function (response) {
            console.log(response);
            $scope.pais = response.data.pais;

        });

    };

    $scope.nacio();

    $scope.userInit = function (idpersona) {
        $scope.perfil = !$scope.perfil;

        $scope.cambios();
//        console.log("perfil :  " + $scope.tipoperfil + "aaa "+  $scope.perfil+ "   idsusario : " + $scope.idusuario + " idpersona: " + idpersona );
        
        if (idpersona == "noidpersona") {
            $scope.estadoform = "Agregar";

        }
        if (idpersona != "noidpersona") {

            $scope.estadoform = "Modificar";
            $scope.personas(idpersona);

        }

    };

    $scope.formulariopersonal = function () {
        $scope.persona.idusuario = $scope.idusuario;
        $scope.persona.idperfil = document.getElementById("idperfil").value;
        $scope.persona.idpersona = document.getElementById("idpersona").value;
        $scope.persona.usuario = document.getElementById("usuario").value;
//        console.log($scope.usuario);
        switch ($scope.estadoform) {
            case "Agregar":
                $scope.opcion = "InsertarPersona";
                break;
            case "Modificar":
                $scope.opcion = "ModificarPersonal"
        }
        $http({
            url: '../controles/controles/Get_perfil.php',
            method: "POST",
            data: {"tipo": $scope.opcion, "persona": $scope.persona}

        }).then(function (response) {

            console.log(response);
            if (response.data.personas == "ok") {
                alert("Se " + $scope.estadoform + " con existo, " + $scope.persona.nombre + " " + $scope.persona.apellido);
                $scope.idpersona = response.data.idpersona;
            }

        });

    };


    $scope.personas = function (idpersona) {
        $http({
            url: '../controles/clases/Get_perfil.php',
            method: "POST",
            data: {"tipo": "persona", "idpersona": idpersona}

        }).then(function (response) {
            console.log(response);
            if (response.data.persona != "false") {
                $scope.persona = {};
                $scope.persona.nombre = response.data.persona[0].nombre;
                $scope.persona.apellido = response.data.persona[0].apellido;
                $scope.persona.documento = response.data.persona[0].documento;
                $scope.persona.nacimiento = new Date(response.data.persona[0].nacimiento);
                $scope.persona.dirparticular = response.data.persona[0].direccion;
                $scope.persona.teleparticular = response.data.persona[0].telefono;
                console.log(response.data.persona[0].sexo);
                $scope.persona.sexo = response.data.persona[0].sexo;
                $scope.persona.nacionalidad = {idpais: response.data.persona[0].pais};
                $scope.persona.estadocivil = response.data.persona[0].estadocivil;

                $scope.persona.barrio = response.data.persona[0].barrio;
                $scope.persona.provincia = response.data.persona[0].provincia;
                $scope.persona.ciudad = response.data.persona[0].ciudad;

            }
        });

    };



    $scope.perfiles = [
        {'id': 1, 'label': 'Administrador'},
        {'id': 2, 'label': 'Editor'},
        {'id': 3, 'label': 'Profesional'},
        {'id': 4, 'label': 'Usuario'}
    ];

});

