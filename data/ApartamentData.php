<?php 
	include_once('dtConnection.php');

	class ApartamentData{

		function ApartamentData(){}

		function get_all_Province(){
			include_once('../model/Province.php');
			$con = new dtConnection;
			$conexion = $con->conect();
			$query = "CALL sp_get_province()";
			$result = mysqli_query($conexion, $query);
			$lista = array();

			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$Province = new Province();
					
				$Province->setId($row['id']);
				$Province->setName($row['name']);
	    		$Province->setIs_active($row['is_active']);

				array_push($lista, $Province);
			}

			mysqli_free_result($result);
			mysqli_close($conexion);

			if (!$result){
				return false;
			} else {
				return $lista;
			}
		}
		function get_all_Canton(){

			include_once('../model/Canton.php');
			$con = new dtConnection;
			$conexion = $con->conect();
			$query = "CALL sp_get_canton()";
			$result = mysqli_query($conexion, $query);
			$lista = array();

			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$Canton = new Canton();
					
				$Canton->setId($row['id']);
				$Canton->setName($row['name']);
	    		$Canton->setIs_active($row['is_active']);
	    		$Canton->setId_province($row['province_id']);

				array_push($lista, $Canton);
			}

			mysqli_free_result($result);
			mysqli_close($conexion);

			if (!$result){
				return false;
			} else {
				return $lista;
			}
		}
		function get_all_Distric(){
			include_once('../model/Distric.php');
			$con = new dtConnection;
			$conexion = $con->conect();
			$query = "CALL sp_get_distric()";
			$result = mysqli_query($conexion, $query);
			$lista = array();

			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$Distric = new Distric();
					
				$Distric->setId($row['id']);
				$Distric->setName($row['name']);
	    		$Distric->setIs_active($row['is_active']);
	    		$Distric->setId_canton($row['canton_id']);
	    		
				array_push($lista, $Distric);
			}

			mysqli_free_result($result);
			mysqli_close($conexion);

			if (!$result){
				return false;
			} else {
				return $lista;
			}
		}

		function insert_apartament($capacity,$lessee_id,$status_id,$district_id,$is_active,$price,$name,$description,$adress,$imageDecode){

			$con = new dtConnection;
			$conexion = $con->conect();

    		$result = $conexion->query("CALL sp_add_apartment('$capacity','$lessee_id','$status_id','$district_id','$is_active','$price','$name','$description','$adress','$imageDecode')");

			mysqli_close($conexion);

			if (!$result){
				return false;
			} else {
				return true;
			}

		}

		function get_apartment_by_lessee($id){

			include_once("../model/Apartment.php");
			$con = new dtConnection;
			$conexion = $con->conect();

			$query = "CALL sp_get_apartment_by_lessee('$id')";
			$result = mysqli_query($conexion, $query);
			$lista = array();
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$Apartment = new Apartment();
					
				$Apartment->setId($row['id']);
				$Apartment->setName($row['name']);
	    		$Apartment->setDescription($row['description']);
		      	$Apartment->setCapacity($row['capacity']);
		      	$Apartment->setAdress($row['adress']);
		      	$Apartment->setStatus_id($row['status_id']);
		      	$Apartment->setStatusName($row['statusName']);
		      	$Apartment->setDistric_id($row['distric_id']);
		      	$Apartment->setDistric($row['distric']);
		      	$Apartment->setPrice($row['price']);
		      	$Apartment->setImage($row['Image']);
		      	
				array_push($lista, $Apartment);
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