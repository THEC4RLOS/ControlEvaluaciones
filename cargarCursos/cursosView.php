<html>
    <div>               
        <table class="table table-striped">            
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
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

