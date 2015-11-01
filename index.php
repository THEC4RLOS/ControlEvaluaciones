<!doctype html>
<html  ng-app="controlDeEvaluacionesApp">
    <head>        
        <meta charset="utf-8">        
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/bootstrap.css" />
        <script src="scripts/controllers/IndexController.js"></script>                                           
    </head>
    <body class="bg-info">
        <div class="header">

            <div class="container" ng-controller="IndexController">
                <div id = "main" class="jumbotron">                    
                    <h2>Inicio Sesión</h2>
                    <label style="color: salmon">{{error}}</label>
                    <p class="lead">                        
                        <input type="text" ng-model="user" class="form-control" placeholder="Usuario" value="2-0562-0727">
                        <br>
                        <input type="password" ng-model="pass" class="form-control" placeholder="Contraseña" value="12345">
                    </p>
                    <p><a class="btn btn-lg btn-success" ng-click="entrar()">Entrar</a></p>
                </div>
            </div>
        </div>    
    </body>
</html>
