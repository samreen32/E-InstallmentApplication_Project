<?php
  $connection = mysqli_connect('localhost','root','','users_auth') or die("Connection failed");
  if(isset($_POST["search_term"])){
    $input = $_POST['search_term'];
    $sql = "SELECT * FROM add_products WHERE product_name LIKE '%{$input}%'";
    $res = mysqli_query($connection, $sql);

    if(mysqli_num_rows($res) > 0){?>


    <?php 
        while($r = mysqli_fetch_assoc($res)){
          ?>

<div class="row">
    <div class="card modal-body mx-2 my-2">
        <button class="btn btn-danger my-3" style="height: 40px; align-self: center; 
                            margin-right: 70%">Rs. <?php echo $r['product_price']; ?></button>
        <div class="img-container">
            <div class="image my-3">
                <img style="width: 150px; height: 150px; align-self: center;  margin-top: 10px;"
                    src="<?php echo "upload/". $r['product_img']; ?>" class="card-img-top" data-index="1" alt="...">
            </div>
        </div>
        <div class="popup-img">
            <span>&times;</span>
            <img src="<?php echo "upload/". $r['product_img']; ?>" />
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $r['product_name']; ?></h5>
            <p class="card-text">Your favorite <?php echo $r['product_name']; ?> is now on
                installment:
            <ul>
                <li>
                    <h6>Description</h6>
                </li>
                <li><i><?php echo $r['product_descr']; ?></li>
                </i>
            </ul>
            </p>
            <h6 class="card-title">Category: <?php echo $r['product_category']; ?></h6>
            <a type="button" href="updateProduct.php?id=<?php echo $r['id']; ?>" class="button button--flex"
                style="height: 40px; align-self: center">Edit
                Product</a>
            <a type="button" href="deleteProduct.php?id=<?php echo $r['id']; ?>" class="btn btn-secondary"
                style="height: 40px; align-self: center">Delete
                Product</a>
        </div>
    </div>
</div>
<?php } ?>
</table>

<?php
    }else{
      echo "No Search Found";
    }
 }
?>