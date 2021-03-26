<?php

class ConnectionDB{

    function connection(){
        $server_name = "localhost";
        $user_name = "root";
        $password = "root";
        $data_base = "crud_pulido";

        $conn = mysqli_connect($server_name, $user_name, $password, $data_base);

        if($conn){
            // echo "SUCCESS";
            // mysqli_close($conn);
        }else{
            die("FAILED" . mysqli_connect_error());
        }
        return $conn;
    }
    
}
?>