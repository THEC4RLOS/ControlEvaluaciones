<center>
<div id="main" class="jumbotron containerLogin">
    <h2>Inicio Sesión</h2>
    <label style="color: salmon">{{error}}</label>
    <p class="lead">
        <input type="text" ng-model="user" class="form-control" placeholder="Usuario">
        <br>
        <input type="password" ng-model="pass" class="form-control" placeholder="Contraseña" value="12345">
    </p>
    <p><a class="btn btn-lg btn-success" ng-click="entrar()">Entrar</a></p>
</div>
</center>
<!--login modal>
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" ng-model="user" class="form-control input-lg" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" ng-model="pass" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block" ng-click="entrar()">Entrar</button>
              
            </div>
          </form>
      </div>
      <div class="modal-footer">
          
      </div>
  </div>
  </div>
</div-->