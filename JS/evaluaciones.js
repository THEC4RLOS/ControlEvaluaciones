angular.module('myApp', []).controller('userCtrl', function ($scope, $http)
{
    $scope.nombre = '';
    $scope.porcentaje = '';
    $scope.evaluaciones = [];
    $scope.nuevo = false;
    $scope.edit = false;
    $scope.error = false;
    $scope.idevaluacion = 'nuevo';
    $scope.insertar = false;
    $http.get("getEval.php")
            .success(function (response) {
                $scope.evaluaciones = response;
                //console.log(response);

            });


    $scope.EditarEvaluacion = function (idevaluacion)
    {
        if (idevaluacion == 'nueva')
        {
            $scope.nuevo = true;
            $scope.edit = false;
            $scope.incomplete = true;
            $scope.nombre = '';
            $scope.porcentaje = '';
        }
        else
        {
            $scope.nuevo = false;
            $scope.edit = true;
            $scope.idevaluacion = eid;
            $scope.nombre = $scope.evaluaciones[idevaluacion - 1].nombre;
            $scope.porcentaje = $scope.evaluaciones[idevaluacion - 1].porcentaje;
        }
    };

    $scope.$watch('nombre', function () {
        $scope.validar();
    });
    $scope.$watch('porcentaje', function () {
        $scope.validar();
    });

    $scope.validar = function ()
    {
        if (!$scope.nombre.length || !$scope.porcentaje.length || isNaN($scope.porcentaje))
        {
            $scope.error = true;
        }
        else
        {
            $scope.error = false;
        }
    };

    $scope.guardar = function ()
    {
        if ($scope.nuevo) {
            //idevaluacion: $scope.evaluaciones.length + 1;
            $scope.evaluaciones.push({idevaluacion: $scope.evaluaciones.length + 1, nombre: $scope.nombre, porcentaje: $scope.porcentaje});
            //            $scope.evaluaciones.push({idevaluacion: $scope.evaluaciones.length + 1, nombre: $scope.nombre, porcentaje: $scope.porcentaje});

            $http.get("setEval.php?idevaluacion=" + idevaluacion + "&idgrupo=15" + "&nombre=" + $scope.nombre + "&porcentaje=" + $scope.porcentaje)
                    .success(function (response) {
                        $scope.insertar = response;
                console.log(response);
                        if ($scope.insertar)
                            alert("Se ha agragado");
                        else
                            alert("No se ha agregado");
                    });
        }
        else
            $scope.evaluaciones[$scope.idevaluacion - 1].nombre = $scope.nombre;
        $scope.evaluaciones[$scope.idevaluacion - 1].porcentaje = $scope.porcentaje;
    };

});