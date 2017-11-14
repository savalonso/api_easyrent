<?php 

	class ApartamentController{


		function ApartamentController(){}

		function get_all_Province(){
			include_once ('../data/ApartamentData.php');
			$ApartamentData = new ApartamentData();
			$ProvinceList = $ApartamentData -> get_all_Province();
			return $ProvinceList;
		}
		function get_all_Canton(){
			include_once ('../data/ApartamentData.php');
			$ApartamentData = new ApartamentData();
			$CantonList = $ApartamentData -> get_all_Canton();
			return $CantonList;
		}
		function get_all_Distric(){
			include_once ('../data/ApartamentData.php');
			$ApartamentData = new ApartamentData();
			$DistricList = $ApartamentData -> get_all_Distric();
			return $DistricList;
		}
	}

?>