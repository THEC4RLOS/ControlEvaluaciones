/* global angular */

angular.module('myApp', []).controller('profViewController', function ($scope, $http)
{ 
    $scope.cursos = [
    ];
    $scope.ListadoEstudiantesPorGrupo=[];
    
    $http.get("/VP/profesorGetData.php?usuario=2-0562-0727&Contra=12345")
            .success(function (response) {
                $scope.miArrayPrueba = response;
                //console.log($scope.miArrayPrueba[0]);
                //console.log($scope.miArrayPrueba[0][0]);
                //console.log(response);
                $scope.profesores=$scope.miArrayPrueba[0][0]+" "+$scope.miArrayPrueba[0][1]+" "+$scope.miArrayPrueba[0][2]
                for(i in $scope.miArrayPrueba)
                    $scope.cursos.push({curso:$scope.miArrayPrueba[i][5],grupo:$scope.miArrayPrueba[i][9],cupo:$scope.miArrayPrueba[i][11],horas:$scope.miArrayPrueba[i][6],creditos:$scope.miArrayPrueba[i][7],cantidad:$scope.miArrayPrueba[i][8]});
            });


 $scope.verMisEstudiantes = function (idGrupo)
    {
        //hacer la consulta con el id del grupo para llenar esta lista temporal con los estudiantes de ese grupo
        $scope.ListadoEstudiantesPorGrupo.length=0;
        $scope.ListadoEstudiantesPorGrupo.push({id:idGrupo,Nombre:'Mainor',apellidos:'Gamboa Rodriguez',Carne:'2013114746',notaTotal:'85'});
        console.log("codigo "+idGrupo);
 };
    function MyCtrl($scope) {
        $scope.name = 'Superhero';
    }
/*
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
    };*/

});