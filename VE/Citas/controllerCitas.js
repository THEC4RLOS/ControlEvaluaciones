myApp.controller('controllerCitas', function ($scope, $http, myfactory)
{
    $scope.citas = [];
    $scope.citasDisponibles = [];

    $scope.usuario = myfactory.user;
    
    $http.get("/VE/Citas/getCitas.php?user=" + myfactory.user)
            .success(function (data) {
                $scope.citas = data;
            })
            .error(function (err) {
                $scope.info = err;
            });
            
    $http.get("/VE/Citas/getCitasDisponibles.php?user=" + myfactory.user)
            .success(function (data) {
                $scope.citasDisponibles = data;
            })
            .error(function (err) {
                $scope.info = err;
            });            
});