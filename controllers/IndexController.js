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
angular.module('controlDeEvaluacionesApp', [])
        .controller('IndexController', function ($scope, $http) {
            $scope.user;
            $scope.pass;
            $scope.userType;
            $scope.Userinfo = "";
            $scope.error = " ";
            $scope.entrar = function () {
                $http.get("/consultaLogin.php?user=" + $scope.user + "&pass=" + $scope.pass)
                        .success(function (data) {                            
                            $scope.Userinfo = data;
                            if(data === "false"){
                                $scope.error="Usuario o contraseña inválidos";
                            }
                            if ($scope.Userinfo.type === "P") {
                                console.log($scope.Userinfo);
                                //$scope.cargarAjax("/views/ventanaProfesor.php");
                            }
                        })
                        .error(function (err) {
                            $scope.info = err;
                        });
            };
            $scope.cargarAjax = function (url) {
                $http.get(url)
                        .success(function (data) {
                            angular.element(document.querySelector('#main')).empty();
                            angular.element(document.querySelector('#main')).append(data);
                        })
                        .error(function (err) {
                            console.log("Error cargando el div")
                        });
            }
        });
