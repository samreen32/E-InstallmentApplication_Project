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
		$sql = "INSERT INTO signup (fname, email, password)
		VALUES ('$fname', '$email', '$password')";
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

	public function createLogin($fname, $password){
		$sql = "SELECT * FROM signup WHERE fname= '$fname' AND password= '$password'";
		$res = mysqli_query($this->connection, $sql);
		return $res;
	}
 
	public function read($id=null){
		$sql = "SELECT t1.*,t2.stud_course FROM task t1 INNER JOIN student_record t2 ON t1.id = t2.task_id";
 		$res = mysqli_query($this->connection, $sql);
 		return $res;
	}

	
	public function update($title, $fname, $lname, $gender, $address, $address2, $city, $state, $zip, $textarea, $id){
		$sql = "UPDATE `signup` SET title='$title', first_name='$fname', last_name='$lname', gender='$gender', address='$address', address2='$address2', city='$city', state='$state', zip='$zip', textarea='$textarea' WHERE id=$id";
		$res = mysqli_query($this->connection, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}
 
	public function delete($id){
		$sql = "DELETE FROM `signup` WHERE id=$id";
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