<?php ?>
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
    <body>
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
                        <td>{{ eval.curso}}</td>
                        <td>{{ eval.grupo}}</td>
                        <td>{{ eval.cupo}}</td>
                        <td>{{ eval.horas}}</td>
                        <td>{{ eval.creditos}}</td>
                        <td>{{ eval.cantidad}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Gestion del curso
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a data-toggle="modal" data-target=".bd-example-modal-lg" ng-click=" verMisEstudiantes(eval.idGrupo)">Notas Evaluaciones</a></li>
                                    <li><a  data-toggle="modal" data-target=".bd-example-modal-Eval " ng-click="grupoAevaluar(eval.idGrupo)">Crear evaluacion</a></li>
                                    <li><a  data-toggle="modal" data-target=".bd-example-modal-VerCitas " ng-click="verCitas(eval.cantidad)">Citas Revision</a></li>                                    
                                    <li><a  data-toggle="modal" data-target=".bd-example-modal-CrearCitas " ng-click="verCrearCitas(eval.cantidad, eval.idGrupo)">Crear citas</a></li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <div></div>
        </div>
        <!--Modal del Evaluaciones por estudiantes-->

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
                                <td  style="  width: 200px !important; ">{{ eval.Nombre}}</td>
                                <td ng-repeat="otro in eval.ListaNotasEstudiantes track by $index"><input type="text" id="{{ otro['id']}}"  ui-Blur="miFun({{ otro['id']}},{{ otro['cedula']}},{{ otro['evaluacion']}});" value="{{ otro['nota']}}"  style="width:30px; height: 20px; "></input></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>




        <!--Modal del Evaluaciones por estudiantes-->


        <!--Modal de crear evaluaciones-->
        <div  class="modal fade bd-example-modal-Eval " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" 
                 style="width:30%;   
                 color: rgba(0, 0, 0, 0.71);
                 font-family: initial;
                 text-align: center;
                 " >

                <div class="modal-content" style="border-color: #449d44;" > 
                    <h1> Nueva evaluacion </h1>
                    <form>
                        <div class="form-group" style="margin-left: 10px;
                             margin-right: 10px;">
                            <label class= control-label">Nombre</label>
                            <div class="">
                                <input required="" type="Nombre" class="form-control" id="inputPassword" placeholder="Ej. Laboratorio 1">
                            </div>
                        </div>
                        <div class="form-group" style="margin-left: 10px;
                             margin-right: 10px;">
                            <label for="inputPassword" class=" control-label">Porcentaje</label>
                            <div class="">
                                <input required=""   type="Porcentaje" class="form-control" id="inputPassword" placeholder="De 0 -100">
                            </div>
                        </div>
                        <button class="btn btn-success" style="margin-bottom: 5px;" ng-click="CrearEvaluacion()">Crear</button>
                    </form>
                </div>
            </div>
        </div>



        <!--Modal de crear evaluaciones-->



        <!--Modal Ver Citas de evaluacion por Curso-->
        <div  class="modal fade bd-example-modal-VerCitas " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content" style="overflow-y: auto;height: 600px;" > 
                    <table  class="table table-striped">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Evaluacion</th>
                                <th>Fecha</th>
                                <th>Hora inicio</th>
                                <th>Hora fin</th>                                
                                <th>Estudiante</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="cita in citas">
                                <td>{{ cita.nombrecurso}}</td>
                                <td>{{ cita.nombreevaluacion}}</td>
                                <td>{{ cita.fecha}}</td>
                                <td>{{ cita.hora_inicio}}</td>
                                <td>{{ cita.hora_fin}}</td>
                                <td>{{ cita.nombreestudiante}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Modal Ver Citas de evaluacion por Curso-->


        <!--Modal Crear Citas a evaluacion por Curso-->
        <div  class="modal fade bd-example-modal-CrearCitas " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content" style="overflow-y: auto;height: 600px;" >
                    <label for="repeatSelect"> Evaluacion: </label>
                    <select name="repeatSelect" id="repeatSelect">
                        <option ng-repeat="evaluacion in evaluaciones track by $index" value="{{evaluacion.idevaluacion}}">{{evaluacion.nombre}}</option>
                    </select>

                    <div >
                        <p>Date: <input type="text" id="datepicker"></p>
                        <p class="input-group">
                            <input type="date" class="form-control" uib-datepicker-popup ng-model="dt" is-open="status.opened" min-date="minDate" max-date="maxDate" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" />
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal Ver Citas de evaluacion por Curso-->
    </body>
</html>

