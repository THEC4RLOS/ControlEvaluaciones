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
        <script src="scripts/controllers/angular-route.js"></script>

    </head>
    <body class="bg-info">

        <div class="header">
            <div ng-view="" class="container"></div>
        </div>    
    </body>
</html>
