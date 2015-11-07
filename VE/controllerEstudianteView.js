myApp.controller('controllerEstudianteView', function ($scope, $location, $http, myfactory) {
    $scope.divCursos = false;
    $scope.divEvaluaciones = false;

    $scope.oneAtATime = true;
    $scope.nombreCompleto = myfactory.nombre;
    /**
     * Funcion para cargar los cursos, este invoca un archivo .php de manera asincrona
     * que retorna un arreglo con objetos de tipo curso, en los que el estudiante esta matriculado
     * @returns {undefined}
     */
    $scope.cargarCursos = function () {
        $scope.divEvaluaciones = false;
        $scope.divCursos = true;
    };
    $scope.cargarNotas = function () {
        $scope.divCursos = false;
        $scope.divEvaluaciones = true;
    };
    $scope.cargarGraficos = function (codigo) {
        $scope.infoEvaluacion = [];
        $http.get("/VE/cargarGraficos/infoEvaluacionGetData.php?user=" + myfactory.user + "&code=" + codigo)
                .success(function (data) {
                    $scope.infoEvaluacion = data;
                    if ($scope.infoEvaluacion.length > 0) {
                        var porcentajeEvaluado = 0;
                        var porcentajeRestante = 100;
                        for (i = 0; i < $scope.infoEvaluacion.length; i++) {
                            porcentajeEvaluado += parseFloat(($scope.infoEvaluacion[i]['porcentaje']));
                        }
                        porcentajeRestante-=porcentajeEvaluado;
                        console.log(porcentajeEvaluado);
                        console.log("porcentajeRestante: "+porcentajeRestante);
                    }
                    else {
                        console.log("Este curso no posee evaluaciones registradas");
                    }
                    console.log("$scope.infoEvaluacion: " + $scope.infoEvaluacion);
                })
                .error(function (err) {
                    $scope.infoEvaluacion = err;
                });


    }
    /*$scope.items = ['Item 1', 'Item 2', 'Item 3'];
     
     $scope.addItem = function () {
     var newItemNo = $scope.items.length + 1;
     $scope.items.push('Item ' + newItemNo);
     };
     
     $scope.status = {
     isFirstOpen: true,
     isFirstDisabled: false
     };*/
});