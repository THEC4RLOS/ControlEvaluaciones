/* global angular */
var globalAlaqueAsignarCursos = 0;

myApp.controller('controllerProfesorView', function ($scope, $http, myfactory)
{
    $scope.cursos = [];
    $scope.ListadoEstudiantesPorGrupo = [];
    $scope.citas = [];
    $scope.verCitas = function (codigo) {
        $http.get("/VP/Citas/getCitas.php?user=" + myfactory.user + "&codigo=" + codigo)
                .success(function (response) {
                    $scope.citas = response;
                });
    };

    $scope.evaluaciones = [];
    $scope.verCrearCitas = function (codigocurso, numgrupo) {
        $http.get("/VP/Citas/getEvaluacionesCurso.php?codigo=" + codigocurso + "&grupo=" + numgrupo)
                .success(function (response) {
                    $scope.evaluaciones = response;
                });
    };

    //console.log("DtaFac "+myfactory.user);
    //console.log("DtaFac "+myfactory.pass);
    //console.log("/VP/profesorGetData.php?usuario="+myfactory.user+"&Contra="+myfactory.pass);
    $http.get("/VP/profesorGetData.php?usuario=" + myfactory.user + "&Contra=" + myfactory.pass)
            .success(function (response) {
                $scope.miArrayPrueba = response;
                //console.log($scope.miArrayPrueba[0]);
                //console.log($scope.miArrayPrueba[0][0]);
                //console.log(response);
                $scope.profesores = $scope.miArrayPrueba[0][0] + " " + $scope.miArrayPrueba[0][1] + " " + $scope.miArrayPrueba[0][2]
                for (i in $scope.miArrayPrueba)
                    $scope.cursos.push({curso: $scope.miArrayPrueba[i][5], grupo: $scope.miArrayPrueba[i][9], cupo: $scope.miArrayPrueba[i][11], horas: $scope.miArrayPrueba[i][6], creditos: $scope.miArrayPrueba[i][7], cantidad: $scope.miArrayPrueba[i][8], idGrupo: $scope.miArrayPrueba[i][12]});
            });




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



        $http.get("/VP/EvaluacionesGetData.php?IG=" + idGrupo)
                .success(function (response) {
                    //console.log(response)

                    $scope.miArrayEvaluaciones = response;
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
        $http.get("/VP/studentsGetData.php?IG=" + idGrupo)
                .success(function (response) {
                    $scope.miArrayParaEstudiantes = [];
                    $scope.miArrayParaEstudiantes = response;
                    arrayF = [];
                    for (i in $scope.miArrayParaEstudiantes) {
                        //hacer el pedido de las notas
                        $http.get("/VP/EvaluacionesDeUnEstudianteGetData.php?IG=" + idGrupo + "&CD=" + $scope.miArrayParaEstudiantes[i][1])
                                .success(function (response1) {

                                    $scope.miArrayParaEstudiantesNotasE = [];
                                    $scope.miArrayParaEstudiantesNotasE = response1;
                                    var array = [];
                                    console.log("Mainor");

                                    var string = "";
                                    var Nota = "";
                                    for (n in $scope.miArrayParaEstudiantesNotasE) {
                                        // console.log($scope.miArrayParaEstudiantesNotasE[n]["cedula"])
                                        //$scope.miArrayParaEstudiantesNotasE[n]["cedula"]=$scope.miArrayParaEstudiantesNotasE[n]["cedula"].replace("-",".");
                                        string = "\"" + $scope.miArrayParaEstudiantesNotasE[n]["cedula"] + "\"";//.replace(/-/g,";");

                                        Nota = $scope.miArrayParaEstudiantesNotasE[n]["nota"];

                                        console.log(string);
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
    $scope.CrearEvaluacion = function ()
    {
        alert(globalAlaqueAsignarCursos);

    };

    $scope.miFun = function (Str1, str2, str3)
    {
        console.log(Str1);
        console.log(document.getElementById(Str1).value);

        var str9 = document.getElementById(Str1).value;
        $http.get("/VP/updateDataEvaluaciones.php?nota=" + str9 + "&evaluacion=" + str3 + "&cedula=" + str2)
                .success(function (response1) {
                    alert(response1);
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

// Adjust the width of thead cells when window resizes
$(window).resize(function () {
    // Get the tbody columns width array
    colWidth = $bodyCells.map(function () {
        return $(this).width();
    }).get();

    // Set the width of thead columns
    $table.find('thead tr').children().each(function (i, v) {
        $(v).width(colWidth[i]);
    });
}).resize(); // Trigger resize handler