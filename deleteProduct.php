<?php
// session_start();
// if(empty($_SESSION['userLoggedin']) || $_SESSION['userLoggedin'] == ''){
//     header("Location: Main.php");
//     die();
// }
    require("user_timestamp.php");

    require_once('database.php');
    $id = $_GET['id'];
    
    $res = $database->deleteProduct($id);
    if($res){
        $_SESSION['status'] = "Product Deleted succcessfully.";
        header('location: viewProduct.php');
    }else{
        $_SESSION['status'] = "Product not deleted.";
    }
?>
