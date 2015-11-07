/* 
 * Controlador para la vista de cursos del usuario, esta vista se encuenta incrustada
 * dentro de estudianteView
 * Realiza la peticion del php cursosGetData, para obtener la informacion de los cursos
 */

myApp.controller('controllerCursosView', function ($scope, $http, myfactory)
{
    $scope.cursos = [];    
    
    $scope.usuario = myfactory.user;      
    
    $http.get("/VE/cargarCursos/cursosGetData.php?user="+myfactory.user)
            .success(function (data) {
                $scope.cursos = data;            
            })
            .error(function (err) {
                $scope.info = err;
            });            
});
