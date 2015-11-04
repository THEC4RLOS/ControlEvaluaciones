myApp.controller('controllerEstudianteView', function ($scope, $location) {
    $scope.oneAtATime = true;
    $scope.grupos = [
        {
            nombre: 'Dynamic Group Header - 1',
            evaluacion: 'Dynamic Group Body - 1'
        },
        {
            nombre: 'Dynamic Group Header - 2',
            evaluacion: 'Dynamic Group Body - 2'
        }
    ];
    $scope.cargarCursos = function () {
        $location.path("/cursosEstudiante")

    };
    $scope.items = ['Item 1', 'Item 2', 'Item 3'];

    $scope.addItem = function () {
        var newItemNo = $scope.items.length + 1;
        $scope.items.push('Item ' + newItemNo);
    };

    $scope.status = {
        isFirstOpen: true,
        isFirstDisabled: false
    };
});