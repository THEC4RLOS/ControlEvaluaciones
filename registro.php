<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"> </script>
        -->
        <script src="JS/angularjs-1.4.7/angular.min.js"></script>
        
        
        <title></title>
    </head>
    <body>

                
        <div ng-app="myApp" ng-controller="myCtrl">

        First Name: <input type="text" ng-model="firstName3"><br>
        Last Name: <input type="text" ng-model="lastName3"><br>
        <br>
        Full Name: {{firstName3 + " " + lastName3}}

        </div>

        <script>
            var app = angular.module('myApp', []);
            app.controller('myCtrl', function($scope) 
            {
                $scope.firstName3= "John";
                $scope.lastName3= "Doe";
            });
        </script>

        
        
    </body>
</html>
