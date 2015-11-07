<div class="panel panel-danger">
    <div class="panel-heading clearfix" style="background-color: #91CFFF; color: black">
        <!--span class="label label-default">Nombre Profesor</span-->
        <!--h4 class="panel-title pull-left" style="padding-top: 10px;">Nombre Profesor</h4-->
        <h4 class="panel-title">{{nombreCompleto}}</h4>
        <hr>
        <div class="btn-group">            
            <button class="btn btn-default btn-sm"  data-toggle="modal" data-target=".bd-example-modal-lg" ng-click="cargarCursos()">Cursos</button>
            <button class="btn btn-default btn-sm" ng-click="cargarGrafico()">Grafico</button>
            <button class="btn btn-default btn-sm" ng-click="cargarCitas()">Citas</button>
            <button class="btn btn-default btn-sm" ng-click="cargarNotas()">Notas</button>
        </div>        
    </div>

    <div ng-show="divCursos" >
        <table class="table table-striped" ng-controller="controllerCursosView" style="background-color: #6A9CFF">            
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Codigo</th>
                    <th>Grupo</th>                                                            
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="curso in cursos">
                    <td>{{ curso.nombre}}</td>
                    <td>{{ curso.codigo}}</td>
                    <td>{{ curso.numero}}</td>
                    <td>
                        <button ng-click="cargarGraficos(curso.codigo)">
                            Gráfico
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div ng-show="divEvaluaciones"><!-- Muestra las evaluaciones de cada curso -->
        <table class="table table-striped" ng-controller="controllerEvaluacionesCursosView" style="background-color: #6A9CFF">            
            <thead>
                <tr>
                    <th>Evaluacion</th>
                    <th>Nota</th>
                    <th>Curso</th>                                                            
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="evaluacion in evaluaciones">
                    <td>{{ evaluacion.nombre}}</td>
                    <td>{{ evaluacion.nota}}</td>
                    <td>{{ evaluacion.curso}}</td>                                        
                </tr>
            </tbody>
        </table>
    </div>
</div>
