<?php

class Database{
	private $connection;
	function __construct()
	{
		$this->connect_db();
	}
 
	public function connect_db(){
		$this->connection = mysqli_connect('localhost','root','','users_auth');
	
		if(mysqli_connect_error()){
			die("<hr> <br>Database Connection Failed<br>" . mysqli_connect_error() ."<br>". mysqli_connect_errno());
		}
	}
 
	public function createSignup($fname, $email, $password){
	   	$hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO signup (fname, email, password)
		VALUES ('$fname', '$email', '$hash')";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true; 
		}else{
			die("err".mysqli_error($this->connection));
			return false;
		}
	}

	public function emailValidation($email){
		//check whethere email already exists or not.
		$exist_email = "SELECT * FROM signup WHERE email = '$email'";
		$result = mysqli_query($this->connection, $exist_email);
		return $result;
	}


	public function createLogin($fname){
		$sql = "SELECT * FROM signup WHERE fname = '$fname'";
		$res = mysqli_query($this->connection, $sql);
		return $res;
	}
	
	//update profile
	public function updateProfile($profile_picture, $id){
		$sql = "UPDATE signup SET profile_picture='$profile_picture' WHERE id=$id";
		$res = mysqli_query($this->connection, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function editProfileInfo($fname, $email, $address, $phone, $id){
		$sql = "UPDATE signup SET fname='$fname', email='$email', address='$address', phone='$phone' WHERE id=$id";
		$res = mysqli_query($this->connection, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function view($id=null){
		$sql = "SELECT * FROM signup";
		if($id){ $sql .= " WHERE id=$id";}
 		$res = mysqli_query($this->connection, $sql);
 		return $res;
	}

	//update user about
	public function updateAbout($about, $id){
		$sql = "UPDATE signup SET about='$about' WHERE id=$id";
		$res = mysqli_query($this->connection, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}



	public function addProduct($product_name, $product_price, $product_img, $product_category, $product_descr){
		
		 $sql = "INSERT INTO add_products (product_name, product_price, product_img, product_category, product_descr)
		 VALUES ('$product_name', '$product_price', '$product_img', '$product_category', '$product_descr')";
		 $res = mysqli_query($this->connection, $sql);
		 if($res){
			  return true; 
		 }else{
			 die("err".mysqli_error($this->connection));
			 return false;
		 }
	 }

	 public function viewProducts($id=null){
		$sql = "SELECT * FROM add_products";
		if($id){ $sql .= " WHERE id=$id";}
 		$res = mysqli_query($this->connection, $sql);
 		return $res;
	}


	public function updateProduct($product_name, $product_price, $product_img, $product_category, $product_descr, $id){
		$sql = "UPDATE add_products SET product_name='$product_name', product_price='$product_price', product_img='$product_img', product_category='$product_category', product_descr='$product_descr' WHERE id=$id";
		$res = mysqli_query($this->connection, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function deleteProduct($id){
		$sql = "DELETE FROM add_products WHERE id=$id";
 		$res = mysqli_query($this->connection, $sql);
 		if($res){
 			return true;
 		}else{
 			return false;
 		}
	}


	public function add_customer($title, $fname, $lname, $gender, $address, $city, $state, $zip, $other_details){
		$sql = "INSERT INTO add_customer (title, fname, lname, gender, address, city, state, zip, other_details) 
		VALUES ('$title', '$fname', '$lname', '$gender', '$address', '$city', '$state', '$zip', '$other_details')";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true;
		}else{
			die("err".mysqli_error($this->connection));
			return false;
		}
	}

	public function viewCustomers($id=null){
		$sql = "SELECT * FROM add_customer";
		if($id){ $sql .= " WHERE id=$id";}
 		$res = mysqli_query($this->connection, $sql);
 		return $res;
	}

	public function updateCustomer($title, $fname, $lname, $gender, $address, $city, $state, $zip, $other_details, $id){
		$sql = "UPDATE add_customer SET title='$title', fname='$fname', lname='$lname', gender='$gender', address='$address', city='$city', state='$state', zip='$zip', other_details='$other_details' WHERE id=$id";
		$res = mysqli_query($this->connection, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function deleteCustomer($id){
		$sql = "DELETE FROM add_customer WHERE id=$id";
 		$res = mysqli_query($this->connection, $sql);
 		if($res){
 			return true;
 		}else{
 			return false;
 		}
	}


	public function sanitize($var){
		$return = mysqli_real_escape_string($this->connection, $var);
		return $return;
	}
}
 
	$database = new Database();
?>