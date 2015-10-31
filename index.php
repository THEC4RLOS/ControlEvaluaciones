<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/bootstrap.css" />
        <!--script src="scripts/controllers/main.js"></script-->
        
        <!--script src="JS/angularjs-1.4.7/angular.min.js"></script-->

    </head>
    <body class="bg-info" ng-app="controlDeEvaluacionesApp">

        <!-- Add your site or application content here -->
        <div class="header">
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="jumbotron">
                    <h2>Inicio Sesión</h2>
                    <p class="lead">
                        <input type="text" ng-model="user" class="form-control" placeholder="Usuario">
                        <br>
                        <input type="text" ng-model="pass" class="form-control" placeholder="Contraseña">
                    </p>
                    <p><a class="btn btn-lg btn-success" ng-href="#/">Entrar</a></p>
                </div>
            </div>

            <!--div class="navbar navbar-default" role="navigation">
              <div class="container">
                <div class="navbar-header">
      
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
      
                  <a class="navbar-brand" href="#/">Control de Evaluaciones</a>
                </div>
      
                <div class="collapse navbar-collapse" id="js-navbar-collapse">
      
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#/">Home</a></li>
                    <li><a ng-href="#/about">About</a></li>
                    <li><a ng-href="#/">Contact</a></li>
                  </ul>
                </div>
              </div>
            </div-->
        </div>

        <div class="container">

            <div ng-view=""></div>
        </div>

        <!--div class="footer">
          <div class="container">
            <p><span class="glyphicon glyphicon-heart"></span> from the Yeoman team</p>
          </div>
        </div-->

        <!-- build:js(.) scripts/vendor.js -->
        <!-- bower:js -->
        <!--script src="bower_components/jquery/dist/jquery.js"></script>
        <script src="bower_components/angular/angular.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
        <script src="bower_components/angular-animate/angular-animate.js"></script>
        <script src="bower_components/angular-cookies/angular-cookies.js"></script>
        <script src="bower_components/angular-resource/angular-resource.js"></script>
        <script src="bower_components/angular-route/angular-route.js"></script>
        <script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
        <script src="bower_components/angular-touch/angular-touch.js"></script>
        <script src="bower_components/jquery-ui/jquery-ui.js"></script>
        <script src="bower_components/angular-ui-sortable/sortable.js"></script-->
        <!-- endbower -->
        <!-- endbuild -->

        <!-- build:js({.tmp,app}) scripts/scripts.js -->

        <!-- endbuild -->
        <script src="scripts/angular.js"></script>
        <script src="scripts/app.js"></script>
        <script src="scripts/sortable.js"></script>
        <script src="scripts/controllers/about.js"></script>
    </body>
</html>
