<?php 

	class User{
		private $id;
		private $name;
		private $last_name;
		private $identification_card;
    	private $phone_number;
		private $second_number;
		private $email;
		private $password;
		private $acount_number;
		private $address;
		private $user_type_id;
		private $user_type_name;

		public function dUsuario(){}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getLast_Name(){
			return $this->last_name;
		}

		public function setLast_Name($last_name){
			$this->last_name = $last_name;
		}

		public function getIdentification_Card(){
	      return $this->identification_card;
	    }

	    public function setIdentification_Card($identification_card){
	      $this->identification_card = $identification_card;
	    }

	    public function getPhone_Number(){
	      return $this->phone_number;
	    }

	    public function setPhone_Number($phone_number){
	      $this->phone_number = $phone_number;
	    }

		public function getSecond_Number(){
			return $this->second_number;
		}

		public function setSecond_Number($second_number){
			$this->second_number = $second_number;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setPassword($password){
			$this->password = $password;
		}

		public function getAcount_Number(){
	      return $this->acount_number;
	    }
	    
	    public function setAcount_Number($acount_number){
	      $this->acount_number = $acount_number;
	    }

		public function getAddress(){
			return $this->address;
		}

		public function setAddress($address){
			$this->address = $address;
		}

		public function getUser_Type_Id(){
			return $this->user_type_id;
		}

		public function setUser_Type_Id($user_type_id){
			$this->user_type_id = $user_type_id;
		}

		public function getUser_Type_Name(){
			return $this->user_type_name;
		}

		public function setUser_Type_Name($user_type_name){
			$this->user_type_name = $user_type_name;
		}
		
	}

 ?>