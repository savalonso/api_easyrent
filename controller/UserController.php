<?php 
	
	class UserController{

		function UserController(){}

		function get_all_user(){
			include_once ('../data/UserData.php');
			$userData = new UserData();
			$userList = $userData -> get_all_user();
			return $userList;
		}

		function login($email, $password){
			include_once ('../data/UserData.php');
			$userData = new UserData();
			$user = $userData -> login($email, $password);
			return $user;
		}
	}

 ?>