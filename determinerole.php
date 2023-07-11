<?php
require_once 'user.php';

function determineRole($role) {
	session_start();
if(!isset($_SESSION['user'])){
	header("Location: login.php");
	exit();
}else{
	$user = $_SESSION['user'];
	$username = $user->username;
	$user_roles = $user->getRoles();
	$found=False;
	$roles = Array($role);
	foreach($user_roles as $urole){
		foreach($roles as $prole){
			if($urole == $prole){
				$found=True;
			}
		}
	}
	return $found;
}
  }

?>