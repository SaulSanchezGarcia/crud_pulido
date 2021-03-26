<?php
require_once("../dbConnection/connection.php");

class Model{

    function login(){
        $conn = new ConnectionDB();
        $connection = $conn->connection();

        $user_name = $_REQUEST['user_name'];
        $password = $_REQUEST['password'];
        
        $mensaje = array("insert" => false, "mensaje" => "");

        $query = "SELECT * FROM employees WHERE user_name = '$user_name' AND password = '$password'";
        $result = mysqli_query($connection, $query);
        $filas = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if($filas >=1){
            if($row['idE'] == 99){
                $mensaje['insert'] = true;
                $mensaje['mensaje'] = "Welcome you are the admin...";
            }else{
                $mensaje['insert'] = true;
                $mensaje['mensaje'] = "Welcome you are an a employee...";
            }
        }else{
            $mensaje['insert'] = false;
            $mensaje['mensaje'] = "The user name or the password are incorrect...";
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        echo json_encode($mensaje);
        mysqli_close($connection);  
    }

    function insert(){
        $conn = new ConnectionDB();
        $connection = $conn->connection();
        
        $name = $_REQUEST['name'];
        $last_name = $_REQUEST['last_name'];
        $email = $_REQUEST['email'];
        $zip = $_REQUEST['zip'];  
        $phone = $_REQUEST['phone'];

        $mensaje = array("insert" => false, "mensaje" => "");
        $query = "INSERT INTO customers(name, last_name, email, zip, phone) VALUES ('$name','$last_name','$email','$zip','$phone')";
        $result = mysqli_query($connection, $query);

        if($result){
            $mensaje['insert'] = true;
            $mensaje['mensaje'] = "Seccessfull Registration...";
        }else{
            $mensaje['insert'] = false;
            $mensaje['mensaje'] = "Something went wrong...";
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        echo json_encode($mensaje);
        mysqli_close($connection); 
    }

    function deleteCustomer(){

        $conn = new ConnectionDB();
        $connection = $conn->connection();

        $idC = $_REQUEST['idC'];

        $query = "DELETE FROM customers WHERE idC = '$idC'";
        $result = mysqli_query($connection, $query);
        $mensaje = array("delete" => false, "mensaje" => "");

        if($result){
            $mensaje['delete'] = true;
            $mensaje['mensaje'] = "Elimination completed...";
        }else{
            $mensaje['delete'] = false;
            $mensaje['mensaje'] = "Something went wrong...";
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        echo json_encode($mensaje);
        mysqli_close($connection); 
    }

    function updateCustomer(){
        $conn = new ConnectionDB();
        $connection = $conn->connection();

        $idCModal =$_REQUEST['idCModal'];
        $nameModal =$_REQUEST['nameModal'];
        $last_nameModal =$_REQUEST['last_nameModal'];
        $emailModal =$_REQUEST['emailModal'];
        $zipModal =$_REQUEST['zipModal'];
        $phoneModal =$_REQUEST['phoneModal'];

        $query = "UPDATE customers 
        SET name = '$nameModal', last_name = '$last_nameModal', email = '$emailModal', zip = '$zipModal', 
        phone = '$phoneModal' WHERE idC = '$idCModal'";
        $result = mysqli_query($connection, $query);
        $mensaje = array("update" => false, "mensaje" => "");

        if($result){
            $mensaje['update'] = true;
            $mensaje['mensaje'] = "Successfully Updated...";
        }else{
            $mensaje['update'] = false;
            $mensaje['mensaje'] = "Something went wrong...";
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        echo json_encode($mensaje);
        mysqli_close($connection); 
    }

    function showInsertCustomers(){
        $conn = new ConnectionDB();
        $connection = $conn->connection();

        $query = "SELECT * FROM customers";
        $result = mysqli_query($connection, $query);

        if($result){
            while ($row = mysqli_fetch_assoc($result)) {
                $arr[] = $row;
            }
            return $arr;
        }else{
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
    }


}
?>