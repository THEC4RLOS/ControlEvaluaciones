<div id="main" class="jumbotron">
    <h2>Inicio Sesión</h2>
    <label style="color: salmon">{{error}}</label>
    <p class="lead">
        <input type="text" ng-model="user" class="form-control" placeholder="Usuario" value="2-0562-0727">
        <br>
        <input type="password" ng-model="pass" class="form-control" placeholder="Contraseña" value="12345">
    </p>
    <p><a class="btn btn-lg btn-success" ng-click="entrar()">Entrar</a></p>
</div>