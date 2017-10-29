<?php 

	include_once ("dtConnection.php");
	
	class UserData {
		
		function UserData(){}

		function get_all_user(){

			include_once("../model/User.php");
			$con = new dtConnection;
			$conexion = $con->conect();

			$query = "CALL sp_get_all_user()";
			$result = mysqli_query($conexion, $query);
			$lista = array();
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$User = new User();
					
				$User->setId($row['id']);
				$User->setName($row['name']);
	    		$User->setLast_Name($row['last_name']);
		      	$User->setIdentification_Card($row['identification_card']);
		      	$User->setPhone_Number($row['phone_number']);
		      	$User->setSecond_Number($row['second_number']);
		      	$User->setEmail($row['email']);
		      	$User->setPassword($row['password']);
		      	$User->setAcount_Number($row['acount_number']);
		      	$User->setAddress($row['address']);
		      	$User->setUser_Type_Name($row['type']);
		      	
				array_push($lista, $User);
			}

			mysqli_free_result($result);
			mysqli_close($conexion);

			if (!$result){
				return false;
			} else {
				return $lista;
			}
		}

		function login($email, $password){

			include_once("../model/User.php");
			$con = new dtConnection;
			$conexion = $con->conect();

			$query = "CALL login('$email', '$password')";
			$result = mysqli_query($conexion, $query);

			$lista = array();
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if($row != null){
				$User = new User();
				
				$User->setId($row['id']);
				$User->setName($row['name']);
	    		$User->setLast_Name($row['last_name']);
		      	$User->setIdentification_Card($row['identification_card']);
		      	$User->setPhone_Number($row['phone_number']);
		      	$User->setSecond_Number($row['second_number']);
		      	$User->setEmail($row['email']);
		      	$User->setPassword($row['password']);
		      	$User->setAcount_Number($row['acount_number']);
		      	$User->setAddress($row['address']);
		      	$User->setUser_Type_Name($row['type']);
		      	
				array_push($lista, $User);
			}
			mysqli_free_result($result);
			mysqli_close($conexion);

			if (!$result){
				return false;
			} else {
				return $lista;
			}
		}
	}	


?>