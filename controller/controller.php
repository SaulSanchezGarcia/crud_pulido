<?php
// error_reporting(0);

require_once("../model/model.php");
$conn = new Model();
$showCustomers = $conn->showInsertCustomers();

$accion = $_REQUEST["accion"];
switch ($accion) {
    case "login":
        $login = new Controller();
        $login -> login();
        break;
    case "insert":
        $insert = new Controller();
        $insert -> insert();
        break;
    case "delete":
        $delete = new Controller();
        $delete -> deleteCustomer();
        break;
    case "update":
        $update = new Controller();
        $update -> updateCustomer();
        break;
}
class Controller{
    
    private $model;

    function login(){
        $model = new Model();
        $model -> login();
    }

    function insert(){
        $model = new Model();
        $model -> insert();
    }

    function deleteCustomer(){
        $model = new Model();
        $model -> deleteCustomer();
    }

    function updateCustomer(){
        $model = new Model();
        $model -> updateCustomer();
    }
}
?>