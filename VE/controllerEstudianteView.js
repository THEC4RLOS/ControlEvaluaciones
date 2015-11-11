/**
 * 
 *Controlador para la vista del estudiante
 *  @param {type} param1
 * @param {type} param2
 */
myApp.controller('controllerEstudianteView', function ($scope, $location, $http, myfactory) {
    $scope.divCursos = false;//para mostrar u cultar el div de cursos
    $scope.divEvaluaciones = false;// para mostrar u ocultar el div de evaluaciones

    $scope.oneAtATime = true; 
    $scope.nombreCompleto = myfactory.nombre;
    /**
     * Funcion para cargar mostrar
     * @returns {undefined}
     */
    $scope.cargarCursos = function () {
        $scope.divEvaluaciones = false;
        $scope.divCitas = false;
        $scope.divCursos = true;
    };
    /**
     * función para mostrar las notas 
     * @returns {undefined}
     */
    $scope.cargarNotas = function () {
        $scope.divCursos = false;
        $scope.divCitas = false;        
        $scope.divEvaluaciones = true;
    };
    $scope.cargarCitas = function () {
        $scope.divCursos = false;
        $scope.divEvaluaciones = false;
        $scope.divCitas = true;        
    };
    $scope.cargarGraficos = function (codigo) {
        $scope.barColor = "5cb85c";
        $scope.infoEvaluacion = [];
        $scope.porcentajeEvaluado = 0;//procentaje que se ha evaluado del curso
        $scope.porcentajeRestante = 100.0;// porcentaje que resta por evaluar del curso
        $scope.miPorcentaje = 0.0;//porcentaje que el estudiante ha ganado
        $scope.porcentajeProyectado = 100.0;
        $http.get("./VE/cargarGraficos/infoEvaluacionGetData.php?user=" + myfactory.user + "&code=" + codigo)
                .success(function (data) {
                    $scope.infoEvaluacion = data;
                    if ($scope.infoEvaluacion.length > 0) {
                        $scope.porcentajeProyectado = 0.0;// porcentaje de nota al que puede aspirar
                        for (i = 0; i < $scope.infoEvaluacion.length; i++) {
                            $scope.porcentajeEvaluado += parseFloat(($scope.infoEvaluacion[i]['porcentaje']));
                            $scope.miPorcentaje += parseFloat(($scope.infoEvaluacion[i]['nota'])) * (parseFloat(($scope.infoEvaluacion[i]['porcentaje'])) * 0.01);
                        }
                        $scope.porcentajeRestante -= $scope.porcentajeEvaluado;
                        $scope.porcentajeProyectado = $scope.miPorcentaje + $scope.porcentajeRestante;
                        if($scope.porcentajeProyectado<67.5){
                            $scope.barColor = "d9534f";
                        }            
                    }                                        
                })
                .error(function (err) {
                    $scope.infoEvaluacion = err;
                });


    };
    $scope.salir = function (){
        $scope.user="";
        $scope.pass="";
        $location.path("/");
    };
    /*$scope.items = ['Item 1', 'Item 2', 'Item 3'];
     
     $scope.addItem = function () {
     var newItemNo = $scope.items.length + 1;
     $scope.items.push('Item ' + newItemNo);
     };
     
     $scope.status = {
     isFirstOpen: true,
     isFirstDisabled: false
     };*/
});