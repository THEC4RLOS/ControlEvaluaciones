/**
 * Controlador para la vista de estudiantes
 * @param {type} param1
 * @param {type} param2
 */
myApp.controller(
        'vistaEstudianteController', function ($scope, $http, $location) {
            /**
             * Funcion para cargar los cursos del estudiante
             * @returns {undefined}
             */            
            $scope.cargarCursos = function () {
                console.log("Hola");                
                $http.get("/cargarCursos/cursosView.php")
                        .success(function (data) {
                            angular.element(document.querySelector('#mainEstudiantes')).empty();
                            angular.element(document.querySelector('#mainEstudiantes')).append(data);
                        })
                        .error(function (err) {
                            console.log("Error cargando el div");
                        });
            };
        });