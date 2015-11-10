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


    $scope.crearCita = function (idcita) {
        $http.get("/VE/Citas/insertCita.php?user=" + myfactory.user + "&idcita=" + idcita)
                .success(function (data) {
                    console.log(data);
                    $scope.citas = [];
                    $scope.citasDisponibles = [];
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
                })
                .error(function (err) {
                    $scope.info = err;
                });
    };
});