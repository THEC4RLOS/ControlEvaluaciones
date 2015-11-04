<div class="panel panel-danger">
    <div class="panel-heading clearfix" style="background-color: #91CFFF; color: black">
        <!--span class="label label-default">Nombre Profesor</span-->
        <!--h4 class="panel-title pull-left" style="padding-top: 10px;">Nombre Profesor</h4-->
        <h4 class="panel-title">Nombre Estudiante</h4>
        <div class="btn-group">            
            <button class="btn btn-default btn-sm"  data-toggle="modal" data-target=".bd-example-modal-lg" ng-click="cargarCursos()">Cursos</button>
            <button class="btn btn-default btn-sm" ng-click="cargarGrafico()">Grafico</button>
            <button class="btn btn-default btn-sm" ng-click="cargarCitas()">Citas</button>
            <button class="btn btn-default btn-sm" ng-click="cargarNotas()">Notas</button>

        </div>        
    </div>
    <!--div ng-show="divCursos" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"-->
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
                </tr>
            </tbody>
        </table>
    </div>

    <div class="check-element animate-show" ng-show="checked">
        <uib-accordion close-others="oneAtATime">
            <uib-accordion-group heading="{{curso.nombre}}" ng-repeat="curso in cursos">
                {{curso.evaluacion}}
            </uib-accordion-group>
        </uib-accordion>
    </div>
</div>
