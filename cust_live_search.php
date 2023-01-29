<?php
  $connection = mysqli_connect('localhost','root','','users_auth') or die("Connection failed");
  if(isset($_POST["search_term"])){
    $input = $_POST['search_term'];
    $sql = "SELECT * FROM add_customer WHERE fname LIKE '{$input}%'";
    $res = mysqli_query($connection, $sql);

    if(mysqli_num_rows($res) > 0){?>

<table class="table">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Other Detais</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php 
        while($r = mysqli_fetch_assoc($res)){
          ?>

    <tr>
        <td><?php echo $r['id']; ?></td>
        <td><?php echo $r['title']; ?></td>
        <td><?php echo $r['fname']; ?></td>
        <td><?php echo $r['lname']; ?></td>
        <td><?php echo $r['gender']; ?></td>
        <td><?php echo $r['address']; ?></td>
        <td><?php echo $r['city']; ?></td>
        <td><?php echo $r['state']; ?></td>
        <td><?php echo $r['zip']; ?></td>
        <td><?php echo $r['other_details']; ?></td>

        <td>
            <a type="button" class="btn btn-primary col-md-12"
                style="height: 40px; text-align: center; background-color: #512da8"
                href="updateCustomer.php?id=<?php echo $r['id']; ?>">
                <i class="fa fa-pencil-square img-fluid mx-2 button__icon" aria-hidden="true"></i></a>
        </td>
        <td>
            <a class="btn btn-danger col-md-12" href="deleteCustomer.php?id=<?php echo $r['id']; ?>"><i
                    class="fa fa-trash img-fluid mx-2 button__icon" aria-hidden="true"></i></a>

        </td>
    </tr>
    <?php } ?>
</table>

<?php
    }else{
      echo "No Record Found";
    }
 }
?>