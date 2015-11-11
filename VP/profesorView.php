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
            <img class="btn btn-default btn-sm pull-right" ng-click="salir()" src="./Icons/1446957049_logout.png">
            <table  class="table table-striped">
                <thead>
                    <tr>
                        <th>Curso</th>


                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="eval in cursos">
                        <td>{{ eval.curso}}</td>


                        <td>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Gestion
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
            <div class="modal-dialog modal-sm" 
                 style="
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
        <!--Modal de crear evaluaciones-->
        <div  class="modal fade bd-example-modal-CrearCitas " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" 
                 style="  
                 color: rgba(0, 0, 0, 0.71);
                 font-family: initial;
                 text-align: center;
                 " >

                <div class="modal-content " >

                    <h2 class="h1"> Agregar Cita </h2>
                    <label for="repeatSelect"> Evaluacion: </label>
                    <select name="repeatSelect" id="evaluacion" ng-model="singleSelect">
                        <option ng-repeat="evaluacion in evaluaciones track by $index" value="{{evaluacion.idevaluacion}}">{{evaluacion.nombre}}</option>
                    </select>

                    <div >
                        <center>
                            <table>
                                <tr>
                                    <td>
                                        Fecha: 
                                    </td>
                                    <td>
                                        <input required="asas" type="text" id="fecha" placeholder="2015-01-01" ng-model="fecha">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Hora inicio: 
                                    </td>
                                    <td>                                        
                                        <input type="text" id="inicio" placeholder="11:30:00" ng-model="inicio">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Hora fin: 
                                    </td>
                                    <td>
                                        <input type="text" id="fin" placeholder="14:00:00" ng-model="fin">
                                    </td>
                                </tr>
                            </table>
                        </center>
                        <button class="btn btn-success" style="margin-bottom: 5px;" ng-click="AgregarCita(singleSelect, fecha, inicio, fin)">Agregar</button>

                    </div>
                    <button ng-show="guardadoOk" class="btn btn-success glyphicon glyphicon-ok" style="margin-bottom: 5px;"></button>
                    <button ng-show="guardadoError" class="btn btn-danger glyphicon glyphicon-remove" style="margin-bottom: 5px;"></button>

                </div>

            </div>

        </div>
        <!--Modal Ver Citas de evaluacion por Curso-->
    </body>
</html>

