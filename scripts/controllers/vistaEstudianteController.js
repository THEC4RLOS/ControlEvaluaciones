angular.module("controlDeEvaluacionesApp", []).controller(
        'vistaEstudianteController', function ($scope, $http) {
            $scope.cargarCursos = function () {
                console.log("Hola");
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