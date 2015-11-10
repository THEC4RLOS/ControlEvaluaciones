<!doctype html>
<html  ng-app="controlDeEvaluacionesApp">
    <head>
        <meta charset="utf-8">        
        <title></title>
        <!--script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-animate.js"></script-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="/VP/controllerProfesorView.js"></script>
        <script src="/Boostrap/js/jquery.js"></script>
        <script src="/Boostrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styles/bootstrap.css" />
        <script src="scripts/controllers/IndexController.js"></script>
        <script src="VE//cargarCursos/controllerCursosView.js"></script>
        <script src="VP/controllerProfesorView.js"></script>
        <script src="VE/controllerEstudianteView.js"></script>
        <script src="VE/controllerEvaluacionesCursos.js"></script>
        <script src="VE/Citas/controllerCitas.js"></script>        
        <script src="scripts/controllers/angular-route.js"></script>
        
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-animate.js"></script>
        <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.14.3.js"></script>

    </head>
    <body class="bg-info" style="background: url('Icons/99A.jpg');">
        <div class="">
            <div ng-view class="container"></div>
        </div>
    </body>
</html>
