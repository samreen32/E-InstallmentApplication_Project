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
	   //insert login credentials in db.
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

		// if (mysqli_num_rows($res) > 0){
		// 	while($row = mysqli_fetch_assoc($res)){
		// 		$user_id = $row['id'];
		// 		$sqlImg = "INSERT INTO user_profile_picture (profile_picture, user_id)
		// 		VALUES (1, '$user_id')";
		// 		mysqli_query($this->connection, $sqlImg);
		
				
		// 	}
		// }else{
		// 	echo "error";
		// }
		return $res;
	}
	
	public function addProduct($product_name, $product_descr, $product_img, $product_category){
		
		 $sql = "INSERT INTO add_products (product_name, product_descr, product_img, product_category)
		 VALUES ('$product_name', '$product_descr', '$product_img', '$product_category')";
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











	public function userProfile($profile_picture){
		$sql = "INSERT INTO user_profile_picture (profile_picture)
		VALUES ('$profile_picture')";
		$res = mysqli_query($this->connection, $sql);
		return $res;
	}

	//update profile
	public function updateProfile($profile_picture, $user_id){
		$sql = "UPDATE user_profile_picture SET profile_picture=0 WHERE user_id=$user_id";
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