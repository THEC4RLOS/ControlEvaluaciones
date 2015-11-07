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
        <script src="cargarCursos/controllerCursosView.js"></script>
        <script src="VP/controllerProfesorView.js"></script>
        <script src="VE/controllerEstudianteView.js"></script>          
        <script src="cargarCursos/controllerCursosView.js"></script>
        <script src="scripts/controllers/angular-route.js"></script>
        
        
    </head>
    <body class="bg-info">
        <div class="header">
            <div ng-view class="container"></div>
        </div>
    </body>
</html>
