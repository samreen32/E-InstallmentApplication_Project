<?php
  $connection = mysqli_connect('localhost','root','','users_auth') or die("Connection failed");


    $n = $_POST['installment_plan'];
    for($i=1; $i<=$n; $i++){
        $payment_status = $_POST["payment_status"];
        $sql = "INSERT INTO sell_product (payment_status) VALUES ('$payment_status')";
        $res = mysqli_query($connection, $sql); 
    }
    echo "inserted";
    
?>