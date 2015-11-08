/* global angular */

myApp.controller('controllerProfesorView', function ($scope, $http,myfactory)
{ 
    $scope.cursos = [
    ];
    $scope.ListadoEstudiantesPorGrupo=[];
    //console.log("DtaFac "+myfactory.user);
    //console.log("DtaFac "+myfactory.pass);
    //console.log("/VP/profesorGetData.php?usuario="+myfactory.user+"&Contra="+myfactory.pass);
    $http.get("/VP/profesorGetData.php?usuario="+myfactory.user+"&Contra="+myfactory.pass)
            .success(function (response) {
                $scope.miArrayPrueba = response;
                //console.log($scope.miArrayPrueba[0]);
                //console.log($scope.miArrayPrueba[0][0]);
                //console.log(response);
                $scope.profesores=$scope.miArrayPrueba[0][0]+" "+$scope.miArrayPrueba[0][1]+" "+$scope.miArrayPrueba[0][2]
                for(i in $scope.miArrayPrueba)
                    $scope.cursos.push({curso:$scope.miArrayPrueba[i][5],grupo:$scope.miArrayPrueba[i][9],cupo:$scope.miArrayPrueba[i][11],horas:$scope.miArrayPrueba[i][6],creditos:$scope.miArrayPrueba[i][7],cantidad:$scope.miArrayPrueba[i][8],idGrupo:$scope.miArrayPrueba[i][12]});
            });


 $scope.verMisEstudiantes = function (idGrupo)
    {


   
        var Element = document.getElementById("TrA");
     
        while (Element.firstChild) Element.removeChild(Element.firstChild);
       // Element.innerHTML="";
        var node = document.createElement("th");         
        node.style.width= "103px";   
        node.innerHTML="Nombre";
        
       // var node1 =document.createElement("th");         
        //node1.innerHTML="Carne";
        
        Element.appendChild(node); 
     //   Element.appendChild(node1);
     
    
     
     $http.get("/VP/EvaluacionesGetData.php?IG="+idGrupo)
            .success(function (response) {
                //console.log(response)
                
                $scope.miArrayEvaluaciones = response;
                for(k in $scope.miArrayEvaluaciones){
                    var node = document.createElement("th");  
                   
                    node.className = "rotate-45";
                    var node1 = document.createElement("div"); 
                    node.appendChild(node1);
                    var node2 = document.createElement("span");  
                   
                    node2.innerHTML=$scope.miArrayEvaluaciones[k][2];
                    node1.appendChild(node2);
                    //node.cssText="class='rotate-45'";
                    //node.
                   // node.innerHTML="<center>"+$scope.miArrayEvaluaciones[k][2]+"</center>";
                    
                    document.getElementById("TrA").appendChild(node); 
                
                      }
            });
        

      
     //hacer la consulta con el id del grupo para llenar esta lista temporal con los estudiantes de ese grupo
        $scope.ListadoEstudiantesPorGrupo.length=0;
         $http.get("/VP/studentsGetData.php?IG="+idGrupo)
            .success(function (response) {
                $scope.miArrayParaEstudiantes=[];
                $scope.miArrayParaEstudiantes = response;
                arrayF=[];
                for(i in $scope.miArrayParaEstudiantes){
                    //hacer el pedido de las notas
                     $http.get("/VP/EvaluacionesDeUnEstudianteGetData.php?IG="+idGrupo+"&CD="+$scope.miArrayParaEstudiantes[i][1])
                        .success(function (response1) {
                           // console.log("Estudiante Nombre");
                             console.log(response1[0]["nombre"] + " "+response1[0]["cedula"] );
                            $scope.miArrayParaEstudiantesNotasE=[];
                            $scope.miArrayParaEstudiantesNotasE = response1;
                            var array=[];
                            
                            for(n in $scope.miArrayParaEstudiantesNotasE){
                                array.push($scope.miArrayParaEstudiantesNotasE[n]["nota"])
                            }
                         //   console.log("Estudiante Nota");
                          //  console.log(array);
                           // var ar5=["0", "0", "82", "0"];
                            //var ar5=["0","0","82","5"];
                            //console.log(ar5);
                            $scope.ListadoEstudiantesPorGrupo.push({id:idGrupo,Nombre:response1[0]["nombre"],Carne:response1[0]["cedula"],ListaNotasEstudiantes:array});
                
               
                            //arrayF.push(array);
                            
                           // $scope.ListadoEstudiantesPorGrupo.push({id:idGrupo,Nombre:$scope.miArrayParaEstudiantes[i][0],Carne:$scope.miArrayParaEstudiantes[i][1],ListaNotasEstudiantes:[0,2,6,5,8]});
                        });
                       // console.log("Estudiante Afuera");
                       //   console.log(arrayF[i]);
     
                    
                }
            });
        
        
        //$scope.ListadoEstudiantesPorGrupo.push({id:idGrupo,Nombre:'Mainor',apellidos:'Gamboa Rodriguez',Carne:'2013114746',notaTotal:'85'});
        console.log("IDgrupo "+idGrupo);
        
 };
    function MyCtrl($scope) {
        $scope.name = 'Superhero';
    };
/*
    $scope.EditarEvaluacion = function (idevaluacion)
    {
        if (idevaluacion == 'nueva')
        {
            $scope.nuevo = true;
            $scope.edit = false;
            $scope.incomplete = true;
            $scope.nombre = '';
            $scope.porcentaje = '';
        }
        else
        {
            $scope.nuevo = false;
            $scope.edit = true;
            $scope.idevaluacion = eid;
            $scope.nombre = $scope.evaluaciones[idevaluacion - 1].nombre;
            $scope.porcentaje = $scope.evaluaciones[idevaluacion - 1].porcentaje;
        }
    };

    $scope.$watch('nombre', function () {
        $scope.validar();
    });
    $scope.$watch('porcentaje', function () {
        $scope.validar();
    });

    $scope.validar = function ()
    {
        if (!$scope.nombre.length || !$scope.porcentaje.length || isNaN($scope.porcentaje))
        {
            $scope.error = true;
        }
        else
        {
            $scope.error = false;
        }
    };

    $scope.guardar = function ()
    {
        if ($scope.nuevo) {
            //idevaluacion: $scope.evaluaciones.length + 1;
            $scope.evaluaciones.push({idevaluacion: $scope.evaluaciones.length + 1, nombre: $scope.nombre, porcentaje: $scope.porcentaje});
            //            $scope.evaluaciones.push({idevaluacion: $scope.evaluaciones.length + 1, nombre: $scope.nombre, porcentaje: $scope.porcentaje});

            $http.get("setEval.php?idevaluacion=" + idevaluacion + "&idgrupo=15" + "&nombre=" + $scope.nombre + "&porcentaje=" + $scope.porcentaje)
                    .success(function (response) {
                        $scope.insertar = response;
                console.log(response);
                        if ($scope.insertar)
                            alert("Se ha agragado");
                        else
                            alert("No se ha agregado");
                    });
        }
        else
            $scope.evaluaciones[$scope.idevaluacion - 1].nombre = $scope.nombre;
        $scope.evaluaciones[$scope.idevaluacion - 1].porcentaje = $scope.porcentaje;
    };*/

});
// Change the selector if needed
var $table = $('table.scroll'),
    $bodyCells = $table.find('tbody tr:first').children(),
    colWidth;

// Adjust the width of thead cells when window resizes
$(window).resize(function() {
    // Get the tbody columns width array
    colWidth = $bodyCells.map(function() {
        return $(this).width();
    }).get();
    
    // Set the width of thead columns
    $table.find('thead tr').children().each(function(i, v) {
        $(v).width(colWidth[i]);
    });    
}).resize(); // Trigger resize handler