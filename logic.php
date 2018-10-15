<?php 

class InsertData{

	function GetDataForm($data){

		$this->formData = $data;

		return $this->formData;

		

	}

	function CheckIfAddressExist(){

		$direccion = $this->formData;

		$sql = "select * from addresses where address='".$direccion."'";

		
		$GetNumRows = $this->con->query($sql);

		try {

			$GetNumRows->rowCount();
			
		} catch (Exception $e) {

			return "lol";
			
		}

		

	}

	function GetIp(){

		$this->ip = $ip;
		return $ip = $_SERVER["REMOTE_ADDR"];
	}

	function TimeRemaining(){


		return $this->expiry = time() + (1 * 60);

		
	}

	function InsertData(){

		$expiry = $this->TimeRemaining();

		//$escape = $this->con->quote($this->formData);





		//$escape,'$expiry'
		$sql = "insert into $this->tablename (address,expiry)values (:address,:expiry)";

		$insert = $this->con->prepare($sql);

		$insert->bindParam(":address",$this->formData);

		$insert->bindParam(":expiry",$expiry);

		if($insert->execute())
		{
			return "ok";
		}else{
			return "error";
		}

		//$this->con->query($sql);




	}

	function DeleteAddress(){

		$sql = "DELETE FROM addresses WHERE expiry < UNIX_TIMESTAMP()";

		return $this->con->query($sql);
	}


}


	

 ?>