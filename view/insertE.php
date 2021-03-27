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
            <label for="exampleInputPassword1">User Name</label>
            <input type="email" class="form-control" id="user_name" name="" placeholder="User Name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="email" class="form-control" id="password" name="" placeholder="Password">
          </div>
          <div>
            <button type="button" class="btn btn-primary" id="" style="margin: 0 0 15px"  onclick="insertEmployee();">Insert</button>
            <button type="button" class="btn btn-secondary" id="" style="margin: 0 0 15px"  onclick="backAdm();">Back Adm</button>

          </div>
          <table class="table" id ="tbody">
          <thead>
          
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Last_name</th>
                <th scope="col">User Name</th>
                <th scope="col">Password</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <?php
                require_once("../controller/controller.php");
                foreach($showEmployees as $emp){
                  $dataEmp = $emp['idE']."||".
                          $emp['name']."||".
                          $emp['last_name']."||".
                          $emp['user_name']."||".
                          $emp['password']."||";
            ?>
            <tbody id="">
            
                <tr>
                    <td><?php echo $emp['name']?></td>
                    <td><?php echo $emp['last_name']?></td>
                    <td><?php echo $emp['user_name']?></td>
                    <td><?php echo $emp['password']?></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeEmployee('<?php echo $emp['idE']?>');">Delete</button></td>
                    <td><button type="button" class="btn btn-success" style="width: 70px" data-toggle="modal" data-target="#exampleModalLongEmployee" onclick ="modalDataEmp('<?php echo $dataEmp?>')">Edit</button></td>
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
<div class="modal fade" id="exampleModalLongEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Employee</h5>
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
            <label for="exampleInputPassword1">User Name</label>
            <input type="email" class="form-control" id="user_nameModal" name="" placeholder="User Name" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="email" class="form-control" id="passwordModal" name="" placeholder="Password" value="">
          </div>
          
          <input type="hidden" class="form-control" id="idEModal" name="" value="">

      </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="updateEmployee();">Update</button>
      </div>
    </div>
  </div>
</div>
<script src="app.js"></script>