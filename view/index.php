<link rel="stylesheet" href="../access/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<!--Para abrir modales se usa bootstrap.min.js-->
<script src="../access/bootstrap/js/bootstrap.min.js"></script>
<script src="../access/bootstrap/js/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="#">NBA SHOES</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLong">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Contact</a>
      </li>
      <li class="nav-item">
        <button type="button" class="btn btn-primary" onclick="viewLogin();">LOGIN</button>
      </li>
    </ul>
  </div>
  </div>
</nav>

<section class="container" id="galeria">
    <div class="text-center pt-5">
      <h1>Galeria</h1>
      <p>Lorem nsectetur adipisicing elit. Consequuntur a autem, obcaecati nostrum illum culpa, praesentium fugiat quaerat ipsam earum numquam magni quis minus dicta veritatis ipsa fuga nulla officia.</p>
    </div>

    <div class="row itemContainer">
        <?php
        require_once("../controller/controller.php");
          foreach($showProducts as $showP){
            echo "<div class='col-lg-4 col-sm-12 items'><img class='itemImg' src=".$showP['img'].">".
            "<h6 class='itemModel'>".$showP['model']."</h6>".
            "<h6 class='itemBrand'>".$showP['brand']."</h6>".
            "<h6 class='itemPlayer'>".$showP['player']."</h6>".
            "<h6 class='itemPrice'>"."$".$showP['price']."</h6>".
            "<button type='button' class='btn btn-primary addCards'>Add To Card</button>".
            "</div>";
          }
        ?>
    </div>
</section>

<table class="table">
          <thead>
              <tr>
                <th scope="col">Img</th>
                <th scope="col">Model</th>
                <th scope="col">Brand</th>
                <th scope="col">Player</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class ="tablebody">

            </tbody>
            </table>

<script src="app.js"></script>