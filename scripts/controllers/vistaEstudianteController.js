myApp.controller(
        'vistaEstudianteController', function ($scope, $http, $location) {
            $scope.cargarCursos = function () {
                console.log("Hola");
                $location.path("/cursosEstudiante")
//                $http.get("/cargarCursos/cursosView.php")
//                        .success(function (data) {
//                            angular.element(document.querySelector('#mainEstudiantes')).empty();
//                            angular.element(document.querySelector('#mainEstudiantes')).append(data);
//                        })
//                        .error(function (err) {
//                            console.log("Error cargando el div");
//                        });
            };
        });