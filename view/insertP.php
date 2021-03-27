<link rel="stylesheet" href="../access/bootstrap/css/bootstrap.min.css">
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<!--Para abrir modales se usa bootstrap.min.js-->
<script src="../access/bootstrap/js/bootstrap.min.js"></script>
<script src="../access/bootstrap/js/bootstrap.bundle.min.js"></script>

<form>
          <div class="form-group">
            <label for="exampleInputEmail1">Model</label>
            <input type="text" class="form-control" id="model" name="" aria-describedby="emailHelp" placeholder="Model">    
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Brand</label>
            <input type="text" class="form-control" id="brand" name="" placeholder="Brand">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Player</label>
            <input type="email" class="form-control" id="player" name="" placeholder="Player">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="email" class="form-control" id="price" name="" placeholder="Price">
          </div>
          <div>
            <button type="button" class="btn btn-primary" id="" style="margin: 0 0 15px"  onclick="insertProduct();">Insert</button>
            <button type="button" class="btn btn-secondary" id="" style="margin: 0 0 15px"  onclick="backAdm();">Back Adm</button>

          </div>
          <table class="table" id ="tbody">
          <thead>
          
              <tr>
                <th scope="col">Model</th>
                <th scope="col">Brand</th>
                <th scope="col">Player</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <?php
                require_once("../controller/controller.php");
                foreach($showProducts as $prod){
                  $dataProd = $prod['idP']."||".
                          $prod['model']."||".
                          $prod['brand']."||".
                          $prod['player']."||".
                          $prod['price']."||";
            ?>
            <tbody id="">
            
                <tr>
                    <td><?php echo $prod['model']?></td>
                    <td><?php echo $prod['brand']?></td>
                    <td><?php echo $prod['player']?></td>
                    <td><?php echo "$".$prod['price']?></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeProduct('<?php echo $prod['idP']?>');">Delete</button></td>
                    <td><button type="button" class="btn btn-success" style="width: 70px" data-toggle="modal" data-target="#exampleModalLongProduct" onclick ="modalDataProd('<?php echo $dataProd?>')">Edit</button></td>
                </tr>
          
            </tbody>
            <?php
            }
            ?>
            </table>
      </form>
        
      </div>
      
    </div>
  </div>
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModalLongProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Model</label>
            <input type="text" class="form-control" id="modelModal" name="" aria-describedby="emailHelp" placeholder="Model" value="">    
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Brand</label>
            <input type="text" class="form-control" id="brandModal" name="" placeholder="Brand" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Player</label>
            <input type="email" class="form-control" id="playerModal" name="" placeholder="User Name" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="email" class="form-control" id="priceModal" name="" placeholder="Price" value="">
          </div>
          
          <input type="hidden" class="form-control" id="idPModal" name="" value="">

      </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="updateProduct();">Update</button>
      </div>
    </div>
  </div>
</div>
<script src="app.js"></script>