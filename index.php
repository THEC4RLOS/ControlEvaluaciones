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
        <div ng-app="" ng-init="nombre='Sin Nombre'">
            <p>Nombre del integrante 
                <input type="text" ng-model="nombre"/>
                <input type="text" ng-model="apellido"/>
            </p>
            <h1>{{nombre}} {{apellido}}</h1>
            <?php
            $i=0;
            echo "<table border=1px cellpadding=5px>";
            echo "<tr><td>Nombre</td><td>Apellido</td></tr>";
            while ($i<5)
            {
                echo "<tr><td>{{nombre}}</td><td>{{apellido}}</td></tr>";
                $i++;
            }
            echo "<table>";
            ?>
        </div>
        
        <hr>            
        
        <div ng-app="Combo" ng-init="Nombre='John'">
            <p>The name is <span ng-bind="Nombre"></span></p>
            <select ng-model="Nombre">
                <option>Juan</option>
                <option>Carlos</option>
                <option>Rita</option>
                <option>Ana</option>
            </select>        
        </div>
        
    </body>
</html>
