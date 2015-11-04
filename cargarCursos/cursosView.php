<html>
    <div>               
        <table class="table table-striped" ng-controller="controllerCursosView">            
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
</html>

