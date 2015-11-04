
<div class="container">

    <h3>Cursos de {{profesores}}</h3>

    <table class="table table-striped">
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
           
            <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" ng-click=" verMisEstudiantes(eval.ide dGrupo)">Ver Estudiantes</button>

        
          </td>
        </tr>
      </tbody>
    </table>

    <hr>
    <div></div>
</div>
<!--Modal del estudiante-->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Apellidos</th>
                          <th>Carne</th>
                          <th>Nota</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="eval in ListadoEstudiantesPorGrupo">
                          <td>{{ eval.Nombre }}</td>
                          <td>{{ eval.apellidos }}</td>
                          <td>{{ eval.Carne }}</td>
                          <td>{{ eval.notaTotal }}</td>
                          <td>
                            <!--aqui va el boton-->
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
<!--Modal del estudiante-->

