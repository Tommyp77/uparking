<?php

require_once 'uparking.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

class User{
	
	public $username;
	public $uid;
	public $roles = array();
	
	function __construct($username){
		global $conn;
		
		$this->username = $username;
		
		$query = "select * from user where username='$username' ";
		
		$result = $conn->query($query);
		if(!$result) die($conn->error);
			
		$rows = $result->num_rows;	
		
		$roles = array();
		for($i=0; $i<$rows; $i++){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$roles[] = $row['Role'];
			$this->uid = $row['UID'];
		}	
		$this->roles = $roles;
	}
	
	function getRoles(){
		return $this->roles;
	}
}

//test

/*
$user = new user("bsmith");
echo $user->username;
echo "<br>";
print_r($user->roles);
*/

?>