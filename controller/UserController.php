<?php 
	
	class UserController{

		function UserController(){}

		function get_all_user(){
			include_once ('../data/UserData.php');
			$userData = new UserData();
			$userList = $userData -> get_all_user();
			return $userList;
		}
	}

 ?>