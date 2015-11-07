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