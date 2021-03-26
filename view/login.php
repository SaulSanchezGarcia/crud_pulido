<link rel="stylesheet" href="../access/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<!--Para abrir modales se usa bootstrap.min.js-->
<script src="../access/bootstrap/js/bootstrap.min.js"></script>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin">
              <div class="form-label-group">
                <label for="inputEmail">User Name:</label>
                <input type="email" id="user_name" class="form-control" placeholder="User Name" required autofocus>
              </div>

              <div class="form-label-group">
                <label for="inputPassword">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Password" required>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onclick="login();">LOGIN</button>
              <!-- <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" >Prueba</button> -->

              <hr class="my-4">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 
 
</body>

<script src="app.js"></script>