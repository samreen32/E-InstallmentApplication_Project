<?php
  $connection = mysqli_connect('localhost','root','','users_auth') or die("Connection failed");

  $k = $_POST["product_name"];
  $sql = "SELECT * FROM add_products WHERE id = {$k}";
  $res = mysqli_query($connection, $sql);

  while($r = mysqli_fetch_array($res)){
    $data['product_price'] = $r['product_price'];
  }
  echo json_encode($data);
?>