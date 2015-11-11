/* global angular */
var globalAlaqueAsignarCursos = 0;
/**
 * Controlador de la vista principal
 * @param {type} param1
 * @param {type} param2
 */
myApp.controller('controllerProfesorView', function ($scope, $http, myfactory,$location)
{
    $scope.guardadoError = false;
    $scope.guardadoOk = false;

    $scope.cursos = [];// cursos recbidos de la consulta
    $scope.ListadoEstudiantesPorGrupo = [];// lista de estudiantes por cada grupo
    $scope.citas = [];// lista de citas disponibles
    /**
     * Funcion para traer las citas de la base de datos, invoca al php
     * @param {type} codigo codigo del curso a buscar citas
     * @returns {undefined}
     */
    $scope.verCitas = function (codigo) {
        $http.get("./VP/Citas/getCitas.php?user=" + myfactory.user + "&codigo=" + codigo)
                .success(function (response) {
                    $scope.citas = response;
                });
    };

    $scope.evaluaciones = [];//lista de evaluaciones
    /**
     * Funcion que invoca un php que trae las citas, dado el codigo del curso y el numero del grupo
     * @param {type} codigocurso
     * @param {type} numgrupo
     * @returns {undefined}
     */
    $scope.verCrearCitas = function (codigocurso, numgrupo) {
        $http.get("./VP/Citas/getEvaluacionesCurso.php?codigo=" + codigocurso + "&grupo=" + numgrupo)
                .success(function (response) {
                    $scope.evaluaciones = response;//respuesta de la consulta
                });
    };
    
    /**
     * Función para agregar la cta de revisión
     * @param {type} ideval el identificador de la evaluacion
     * @param {type} fecha de la cita
     * @param {type} inicio hora de inicio
     * @param {type} fin hora de fin
     * @returns {undefined}
     */
    $scope.AgregarCita = function (ideval, fecha, inicio, fin) {
        if (typeof ideval === "undefined" || typeof fecha === "undefined" || typeof fin === "undefined" || typeof inicio === "undefined") {
            $scope.guardadoError = true;
            $scope.guardadoOk = false;
        }
        else {
            $scope.guardadoError = false;
            $scope.guardadoOk = false;
            $http.get("./VP/Citas/insertCita.php?idevaluacion=" + ideval + "&fecha=" + fecha + "&hora_inicio=" + inicio + "&hora_fin=" + fin)
                    .success(function (data) {
                        //alert(data);
                        if (data === true) {
                            $scope.guardadoOk = true;
                            $scope.guardadoError = false;
                        }
                        else if (data === false) {
                            $scope.guardadoOk = false;
                            $scope.guardadoError = true;
                        }
                    })
                    .error(function (err) {
                        $scope.info = err;
                        $scope.guardadoError = false;
                        $scope.guardadoOk = false;
                    });
        }

    };
  
    //cargar los cursos del profesor y la información, dado su nombre y contaseña
    /*Obtener la la info de un profesor*/
    $http.get("./VP/profesorGetData.php?usuario=" + myfactory.user + "&Contra=" + myfactory.pass)
            .success(function (response) {
                $scope.miArrayPrueba = response;
                //console.log($scope.miArrayPrueba[0]);
                //console.log($scope.miArrayPrueba[0][0]);
                //console.log(response);
                $scope.profesores = $scope.miArrayPrueba[0][0] + " " + $scope.miArrayPrueba[0][1] + " " + $scope.miArrayPrueba[0][2]
                for (i in $scope.miArrayPrueba)
                    $scope.cursos.push({curso: $scope.miArrayPrueba[i][5], grupo: $scope.miArrayPrueba[i][9], cupo: $scope.miArrayPrueba[i][11], horas: $scope.miArrayPrueba[i][6], creditos: $scope.miArrayPrueba[i][7], cantidad: $scope.miArrayPrueba[i][8], idGrupo: $scope.miArrayPrueba[i][12]});
            });

    $scope.salir = function (){
          $scope.user="";
        $scope.pass="";
           $location.path("/");
       };

/*Ver los estudiantes de un curso y obtener las notas por cada uno*/
    $scope.verMisEstudiantes = function (idGrupo)
    {


        var idGlobal = 0;
        var Element = document.getElementById("TrA");

        while (Element.firstChild)
            Element.removeChild(Element.firstChild);
        // Element.innerHTML="";
        var node = document.createElement("th");
        node.style.width = "200px";
        node.innerHTML = "Nombre";

        // var node1 =document.createElement("th");         
        //node1.innerHTML="Carne";

        Element.appendChild(node);
        //   Element.appendChild(node1);


        //adquiere las evaluaciones de un grupo, dado un id del grupo (num)
        //esto para asignar las citas de revisión
        $http.get("./VP/EvaluacionesGetData.php?IG=" + idGrupo)
                .success(function (response) {
                    //console.log(response)the width of thead columns

                    $scope.miArrayEvaluaciones = response;//evaluaciones del grupo
                    for (k in $scope.miArrayEvaluaciones) {
                        var node = document.createElement("th");

                        node.className = "rotate-45";
                        var node1 = document.createElement("div");
                        node.appendChild(node1);
                        var node2 = document.createElement("span");

                        node2.innerHTML = $scope.miArrayEvaluaciones[k][2];
                        node1.appendChild(node2);
                        //node.cssText="class='rotate-45'";
                        //node.
                        // node.innerHTML="<center>"+$scope.miArrayEvaluaciones[k][2]+"</center>";

                        document.getElementById("TrA").appendChild(node);

                    }
                });


        //hacer la consulta con el id del grupo para llenar esta lista temporal con los estudiantes de ese grupo
        $scope.ListadoEstudiantesPorGrupo.length = 0;
        $http.get("./VP/studentsGetData.php?IG=" + idGrupo)
                .success(function (response) {
                    $scope.miArrayParaEstudiantes = [];
                    $scope.miArrayParaEstudiantes = response;
                    arrayF = [];
                    for (i in $scope.miArrayParaEstudiantes) {
                        //hacer el pedido de las notas
                        $http.get("./VP/EvaluacionesDeUnEstudianteGetData.php?IG=" + idGrupo + "&CD=" + $scope.miArrayParaEstudiantes[i][1])
                                .success(function (response1) {

                                    $scope.miArrayParaEstudiantesNotasE = [];
                                    $scope.miArrayParaEstudiantesNotasE = response1;
                                    var array = [];
                                    //console.log("Mainor");

                                    var string = "";
                                    var Nota = "";
                                    for (n in $scope.miArrayParaEstudiantesNotasE) {
                                        // console.log($scope.miArrayParaEstudiantesNotasE[n]["cedula"])
                                        //$scope.miArrayParaEstudiantesNotasE[n]["cedula"]=$scope.miArrayParaEstudiantesNotasE[n]["cedula"].replace("-",".");
                                        string = "\"" + $scope.miArrayParaEstudiantesNotasE[n]["cedula"] + "\"";//.replace(/-/g,";");

                                        Nota = $scope.miArrayParaEstudiantesNotasE[n]["nota"];

                                        //console.log(string);
                                        array.push({nota: Nota, cedula: string, evaluacion: $scope.miArrayParaEstudiantesNotasE[n]["idevaluacion"], id: idGlobal})
                                        idGlobal++;
                                    }

                                    $scope.ListadoEstudiantesPorGrupo.push({id: idGrupo, Nombre: response1[0]["nombre"], Carne: response1[0]["cedula"], ListaNotasEstudiantes: array});
                                });

                    }
                });


        //$scope.ListadoEstudiantesPorGrupo.push({id:idGrupo,Nombre:'Mainor',apellidos:'Gamboa Rodriguez',Carne:'2013114746',notaTotal:'85'});
        //   console.log("IDgrupo "+idGrupo);

    };
    
    $scope.grupoAevaluar = function (id) {
        globalAlaqueAsignarCursos = id;
    };
    /*Crea evaluaciones*/
    $scope.CrearEvaluacion = function ()
    {
       
        var nombre=document.getElementById("idNombre").value;
        var pass=document.getElementById("idpass").value;
        if( nombre ==="" || pass ==="")
        {
            alert("Rellene todos los campos");
        }
        else{
       // alert(globalAlaqueAsignarCursos);
            $http.get("./VP/insertDataEvaluaciones.php?GP=" + globalAlaqueAsignarCursos + "&NR=" + nombre+"&PJ="+pass)
                                     .success(function (response1) {
                                        document.getElementById("idNombre").value="";
                                       document.getElementById("idpass").value="";
                                       
                                     });
            };
    }

    /**
     * 
     * @param {type} Str1
     * @param {type} str2
     * @param {type} str3
     * @returns {undefined}
     */
    $scope.miFun = function (Str1, str2, str3)
    {
      //  console.log(Str1);
      //  console.log(document.getElementById(Str1).value);

        var str9 = document.getElementById(Str1).value;
        $http.get("./VP/updateDataEvaluaciones.php?nota=" + str9 + "&evaluacion=" + str3 + "&cedula=" + str2)
                .success(function (response1) {
                   // alert(response1);
                });

        //console.log(Str1+" "+" "+str2+" "+str3);
    };

}).directive('uiBlur', function () {
    return function (scope, elem, attrs) {
        elem.bind('blur', function () {
            scope.$apply(attrs.uiBlur);
        });
    };
});
;
// Change the selector if needed
var $table = $('table.scroll'),
        $bodyCells = $table.find('tbody tr:first').children(),
        colWidth;


//ajusta el ancho de las celdas cuando se cambia el tamaño
$(window).resize(function () {
    // Get the tbody columns width array
    colWidth = $bodyCells.map(function () {
        return $(this).width();
    }).get();

    // Setea el ancho de la columna
    $table.find('thead tr').children().each(function (i, v) {
        $(v).width(colWidth[i]);
    });
}).resize();
