<div class="panel panel-danger">
    <div class="panel-heading clearfix">
        <!--span class="label label-default">Nombre Profesor</span-->
        <!--h4 class="panel-title pull-left" style="padding-top: 10px;">Nombre Profesor</h4-->
        <h4 class="panel-title">Nombre Estudiante</h4>
        <div class="btn-group">            
            <button class="btn btn-default btn-sm" ng-click="cargarCursos()">Cursos</button>
            <button class="btn btn-default btn-sm" ng-click="cargarGrafico()">Grafico</button>
            <button class="btn btn-default btn-sm" ng-click="cargarCitas()">Citas</button>
            <button class="btn btn-default btn-sm" ng-click="cargarNotas()">Notas</button>

        </div>
        <div  id = "mainEstudiantes"></div>
    </div>
    <div class="check-element animate-show" ng-show="checked">
        <uib-accordion close-others="oneAtATime">
            <uib-accordion-group heading="{{curso.nombre}}" ng-repeat="curso in cursos">
                {{curso.evaluacion}}
            </uib-accordion-group>
        </uib-accordion>
    </div>
</div>
