<?php
error_reporting(0);

require_once("../model/model.php");
$conn = new Model();
$showCustomers = $conn->showInsertCustomers();
$showEmployees = $conn->showInsertEmployees();
$showProducts = $conn->showInsertProducts();

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
    case "insertEmployee":
        $insertEmployee = new Controller();
        $insertEmployee -> insertEmployee();
        break;
    case "deleteEmployee":
        $deleteEmployee = new Controller();
        $deleteEmployee -> deleteEmployee();
        break;
    case "updateEmployee":
        $updateEmployee = new Controller();
        $updateEmployee -> updateEmployee();
        break;
    case "insertProduct":
        $insertProduct = new Controller();
        $insertProduct -> insertProduct();
        break;
    case "deleteProduct":
        $deleteProduct = new Controller();
        $deleteProduct -> deleteProduct();
        break;
    case "updateProduct":
        $updateProduct = new Controller();
        $updateProduct -> updateProduct();
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

    function insertEmployee(){
        $model = new Model();
        $model -> insertEmployee();
    }

    function deleteEmployee(){
        $model = new Model();
        $model -> deleteEmployee();
    }

    function updateEmployee(){
        $model = new Model();
        $model -> updateEmployee();
    }

    function insertProduct(){
        $model = new Model();
        $model -> insertProduct();
    }

    function deleteProduct(){
        $model = new Model();
        $model -> deleteProduct();
    }

    function updateProduct(){
        $model = new Model();
        $model -> updateProduct();
    }
}
?>