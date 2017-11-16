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
			//$response = $ApartamentData-> insert_apartament($capacity,$lessee_id,$status_id,$district_id,$is_active,$price,$name,$description,$adress,$Image);
			return true;
 		}
 		function decode_image($Image){
 			
			$imageFile = base64_decode($Image);
			$image_name = strftime( "%Y%m%d%H%M%S", time() );
			file_put_contents("../imgApartamentos/"."apartment".$image_name.".png",$imageFile);

			/*//eliminamos data:image/png; y base64, de la cadena que tenemos
			//hay otras formas de hacerlo    
			list(, $Base64Img) = explode(';', $Base64Img);
			list(, $Base64Img) = explode(',', $Base64Img);
			//Decodificamos $Base64Img codificada en base64.
			$Base64Img = base64_decode($Base64Img);
			//escribimos la información obtenida en un archivo llamado 
			//unodepiera.png para que se cree la imagen correctamente
			file_put_contents('unodepiera.png', $Base64Img); 
			echo "<img src='unodepiera.png' alt='unodepiera' />";*/
 		}
	}

?>