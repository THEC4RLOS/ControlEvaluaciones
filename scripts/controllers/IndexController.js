/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Controlador para el index, se encarga de la gestion del longin y cargar las vistas
 * segun el tipo de usuario que inicia sesion
 * @param {type} param1
 * @param {type} param2
 */

var myApp = angular.module('controlDeEvaluacionesApp', ['ngRoute'])

        .factory('myfactory', function () {

            var fac = {};
            fac.user = "";
            fac.pass = "";
            return fac;

        })
        .controller('IndexController', function ($scope, $http, $location, myfactory) {
            $scope.user = "2-0562-0727";//2-0562-0727
            $scope.pass = "12345";

            myfactory.user = $scope.user;
            myfactory.pass = $scope.pass;

       
            $scope.userType;
            $scope.Userinfo = "";
            $scope.error = " ";
            $scope.entrar = function () {
                
                $scope.error = " ";
                $http.get("./consultaLogin.php?user=" + $scope.user + "&pass=" + $scope.pass)
                        .success(function (data) {
                            $scope.Userinfo = data;
                            if (data === "false") {
                                $scope.error = "Usuario o contraseña inválidos";
                            }
                            if ($scope.Userinfo.type === "P") {
                                console.log($scope.Userinfo);
                                myfactory.nombre = $scope.Userinfo.nombreCompleto;
                                $location.path("/profesor");
                            }
                            if ($scope.Userinfo.type === "E") {
                                console.log($scope.Userinfo);
                                myfactory.nombre = $scope.Userinfo.nombreCompleto;
                                $location.path("/estudiante");
                            }
                        })
                        .error(function (err) {
                            $scope.info = err;
                        });
                myfactory.user = $scope.user;
                myfactory.pass = $scope.pass;
               
            };
            $scope.cargarAjax = function (url) {
                $http.get(url)
                        .success(function (data) {
                            angular.element(document.querySelector('#main')).empty();
                            angular.element(document.querySelector('.container')).empty();
                            //angular.element(document.querySelector('#container')).empty();                    
                            angular.element(document.querySelector('.container')).append(data);
                            //angular.element(document.querySelector('#container')).append(data);
                        })
                        .error(function (err) {
                            console.log("Error cargando el div");
                        });
            };
        })
        .config(function ($routeProvider) {
            $routeProvider
                    .when('/', {
                        templateUrl: 'views/inicioSesion.php',
                        controller: 'IndexController',
                        controllerAs: 'inicioSesion'
                    })
                    .when('/profesor', {
                        templateUrl: 'VP/profesorView.php',
                        controller: 'controllerProfesorView'
                    })
                    .when('/estudiante', {
                        templateUrl: 'VE/estudianteView.php',
                        controller: 'controllerEstudianteView'
                    })
                    .when('/cursosEstudiante', {
                        templateUrl: 'cargarCursos/cursosView.php',
                        controller: 'controllerCursosView'
                    })
                    .otherwise({
                        redirectTo: '/'
                    });
        });
