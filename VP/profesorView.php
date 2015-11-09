<?php
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="/VP/controllerProfesorView.js"></script>
    <script src="/Boostrap/js/jquery.js"></script>
    <script src="/Boostrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="VP/CSSparaTables.css" />        
    <title>CursosTEC</title>
</head>
<body ng-app="myApp" ng-controller="profViewController">
    <div class="container" style="background: white">

    <h3>Cursos de {{profesores}}</h3>

    <table  class="table table-striped">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Semestre</th>
                <th>Cupo</th>
                <th>Horas</th>
                <th>Creditos</th>
                <th>Codigo</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="eval in cursos">
                <td>{{ eval.curso }}</td>
                <td>{{ eval.grupo }}</td>
                <td>{{ eval.cupo }}</td>
                <td>{{ eval.horas }}</td>
                <td>{{ eval.creditos }}</td>
                <td>{{ eval.cantidad }}</td>
                <td>
                    <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      Gestion del curso
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a data-toggle="modal" data-target=".bd-example-modal-lg" ng-click=" verMisEstudiantes(eval.idGrupo)">Notas Evaluaciones</a></li>
                      <li><a >Crear evaluacion</a></li>
                      <li><a >Citas Revicion</a></li>
                      <li><a >Crear citas</a></li>
                    </ul>
                  </div>
                    <!--<button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" ng-click=" verMisEstudiantes(eval.idGrupo)">Ver Estudiantes</button>
                    -->

                </td>
            </tr>
        </tbody>
    </table>

    <hr>
    <div></div>
</div>
<!--Modal del estudiante-->

    <div  class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            
            <div class="modal-content" style="overflow-y: auto;height: 600px;" > 
                <table class="table table-striped table-header-rotated scroll" >
                    <thead>
                        <tr id="TrA">
                            <th style="  width: 200px !important; ">Nombre</th>

                        </tr>
                    </thead>
                    <tbody >
                    
                        <tr  ng-repeat="eval in ListadoEstudiantesPorGrupo">
                            <td  style="  width: 200px !important; ">{{ eval.Nombre }}</td>
                            <td ng-repeat="otro in eval.ListaNotasEstudiantes track by $index "><input type="text" id="{{ otro['id'] }}"  ui-Blur="miFun({{ otro['id'] }},{{ otro['cedula'] }},{{ otro['evaluacion'] }});" value="{{ otro['nota'] }}"  style="width:30px; height: 20px; "></input></td>
                            
                        </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>

<!--Modal del estudiante-->
</body>
</html>

