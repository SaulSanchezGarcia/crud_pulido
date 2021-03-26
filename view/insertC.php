<link rel="stylesheet" href="../access/bootstrap/css/bootstrap.min.css">
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<!--Para abrir modales se usa bootstrap.min.js-->
<script src="../access/bootstrap/js/bootstrap.min.js"></script>
<script src="../access/bootstrap/js/bootstrap.bundle.min.js"></script>

<form>
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="name" name="" aria-describedby="emailHelp" placeholder="Name">    
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="" placeholder="Last Name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" id="email" name="" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Zip</label>
            <input type="email" class="form-control" id="zip" name="" placeholder="Zip Code" minlength="3" maxlength="4">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" id="phone" name="" placeholder="Phone" minlength="10" maxlength="10">
          </div>
          <div>
            <button type="button" class="btn btn-primary" id="botonCust" style="margin: 0 0 15px"  onclick="insertCustomer();">Insert</button>
          </div>
          <table class="table" id ="tbody">
          <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Last_name</th>
                <th scope="col">Email</th>
                <th scope="col">Zip</th>
                <th scope="col">Phone</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <?php
                require_once("../controller/controller.php");
                foreach($showCustomers as $cust){
                  $data = $cust['idC']."||".
                          $cust['name']."||".
                          $cust['last_name']."||".
                          $cust['email']."||".
                          $cust['zip']."||".
                          $cust['phone'];
            ?>
            <tbody id="">
            
                   <tr>
                    <td><?php echo $cust['name']?></td>
                    <td><?php echo $cust['last_name']?></td>
                    <td><?php echo $cust['email']?></td>
                    <td><?php echo $cust['zip']?></td>
                    <td><?php echo $cust['phone']?></td>
                    <td><button type="button" class="btn btn-danger" onclick="remove('<?php echo $cust['idC']?>');">Delete</button></td>
                    <td><button type="button" class="btn btn-success" style="width: 70px" data-toggle="modal" data-target="#exampleModalLong" onclick ="modalData('<?php echo $data?>')">Edit</button></td>
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
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="nameModal" name="" aria-describedby="emailHelp" placeholder="Name" value="">    
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Last Name</label>
            <input type="text" class="form-control" id="last_nameModal" name="" placeholder="Last Name" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" id="emailModal" name="" placeholder="Email" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Zip</label>
            <input type="email" class="form-control" id="zipModal" name="" placeholder="Zip Code" minlength="3" maxlength="4" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" id="phoneModal" name="" placeholder="Phone" minlength="10" maxlength="10" value="">
          </div>
          <input type="hidden" class="form-control" id="idCModal" name="" placeholder="Phone" minlength="10" maxlength="10" value="">

      </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="updateCustomer();">Update</button>
      </div>
    </div>
  </div>
</div>
<script src="app.js"></script>