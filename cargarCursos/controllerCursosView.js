/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('myApp', []).controller('profViewController', function ($scope, $http)
{
    $scope.cursos = [];    
    $scope.usuario;
    
    $http.get("/cargarCurosos/cursosGetData.php")
            .success(function (data) {
                $scope.cursos = data;
            })
            .error(function (err) {
                $scope.info = err;
            });            
    console.log($scope.cursos);
});
