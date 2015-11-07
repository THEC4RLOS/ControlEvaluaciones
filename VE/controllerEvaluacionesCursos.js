/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

myApp.controller('controllerEvaluacionesCursosView', function ($scope, $http, myfactory)
{
    $scope.evaluaciones = [];

    $scope.usuario = myfactory.user;
    
    $http.get("/VE/getEvaluacionesCursos.php?user=" + myfactory.user)
            .success(function (data) {
                $scope.evaluaciones = data;
            })
            .error(function (err) {
                $scope.info = err;
            });
});