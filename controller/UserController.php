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

		function create_user($name, $last_name, $identification_card, $phone_number, $second_number, $email, $password, $account_number, $address, $user_type_id){
			include_once ('../data/UserData.php');
			$userData = new UserData();
			$is_register = $userData -> create_user($name, $last_name, $identification_card, $phone_number, $second_number, $email, $password, $account_number, $address, $user_type_id);
			return $is_register;
		}
	}

 ?>