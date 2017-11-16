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
	
		function insert_apartament($capacity,$lessee_id,$status_id,$district_id,$is_active,$price,$name,$description,$adress,$Image){
			include_once ('../data/ApartamentData.php');
			$ApartamentData = new ApartamentData();
			$imageDecode= ApartamentController::decode_image($Image);
			$response = $ApartamentData-> insert_apartament($capacity,$lessee_id,$status_id,$district_id,$is_active,$price,$name,$description,$adress,$imageDecode);

			return $response;
 		}
 		function decode_image($Image){
 			
			$imageFile = base64_decode($Image);
			$image_name = strftime( "%Y%m%d%H%M%S", time() );
			file_put_contents("../imgApartamentos/"."apartment".$image_name.".png",$imageFile);
			$finalImageName = "apartment".$image_name.".png";
			return $finalImageName;
 		}
	}

?>