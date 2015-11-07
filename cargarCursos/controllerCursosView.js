/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

myApp.controller('controllerCursosView', function ($scope, $http, myfactory)
{
    $scope.cursos = [];    
    
    $scope.usuario = myfactory.user;      
    
    $http.get("/cargarCursos/cursosGetData.php?user="+myfactory.user)
            .success(function (data) {
                $scope.cursos = data;
            })
            .error(function (err) {
                $scope.info = err;
            });            
});
