myApp.controller('controllerEstudianteView', function ($scope, $location,$http,myfactory) {
    $scope.divCursos = false;
    $scope.oneAtATime = true;
    $scope.nombreCompleto = myfactory.nombre;
    $scope.grupos = [
        {
            nombre: 'Dynamic Group Header - 1',
            evaluacion: 'Dynamic Group Body - 1'
        },
        {
            nombre: 'Dynamic Group Header - 2',
            evaluacion: 'Dynamic Group Body - 2'
        }
    ];
    /**
     * Funcion para cargar los cursos, este invoca un archivo .php de manera asincrona
     * que retorna un arreglo con objetos de tipo curso, en los que el estudiante esta matriculado
     * @returns {undefined}
     */
    $scope.cargarCursos = function () {
        console.log("Hola");
        $scope.divCursos = true;
        
        ////        $http.get("/cargarCursos/cursosView.php")
//                .success(function (data) {
//                    angular.element(document.querySelector('#mainEstudiantes')).empty();
//                    angular.element(document.querySelector('#mainEstudiantes')).append(data);
//                })
//                .error(function (err) {
//                    console.log("Error cargando el div");
//                });
    };
    $scope.items = ['Item 1', 'Item 2', 'Item 3'];

    $scope.addItem = function () {
        var newItemNo = $scope.items.length + 1;
        $scope.items.push('Item ' + newItemNo);
    };

    $scope.status = {
        isFirstOpen: true,
        isFirstDisabled: false
    };
});