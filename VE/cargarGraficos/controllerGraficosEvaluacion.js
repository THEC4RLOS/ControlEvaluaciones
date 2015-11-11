/* 
 * Controlador para la vista que genera graficos sobre la evaluacion deseada
 */

myApp.controller('controllerCursosView', function ($scope, $http, myfactory)
{
    $scope.cursos = [];    
    
    $scope.usuario = myfactory.user;      
    
    $http.get("./VE/cargarCursos/cursosGetData.php?user="+myfactory.user)
            .success(function (data) {
                $scope.cursos = data;
            })
            .error(function (err) {
                $scope.info = err;
            });            
});
