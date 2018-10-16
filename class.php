<?php

class Conection{
	private $con;
	private $host = "localhost";
	private $dbname = "eggdrafaucet";
	private $tablename = "addresses";
	private $user = "root";
	private $password = "";
	public  $formData;
	private $ip;

	
	function Conect(){


		$host = $this->host;
		$dbname =  $this->dbname;
		$user =$this->user;
		$password = $this->password;


		try {

			$this->con = new PDO("mysql:host=$host;dbname=$dbname","root","$password");

			$ConectionReturned = $this->con;

			return $ConectionReturned;


			
		} catch (Exception $e) {

			echo $e;
			
		}

	}

	function GetDataForm($data){

		$this->formData = $data;

		return $this->formData;

		

	}

	function Filteraddress(){

		//preg_match('/^Xtra([a-zA-Z0-9]{200}|[a-zA-Z0-9]{183})\s*$/'

		$data = $this->formData;

		return $data;
	}

	function CheckIfAddressExist(){

		$direccion = $this->formData;

		$sql = "select * from addresses where address='".$direccion."'";

		
		$GetNumRows = $this->con->prepare($sql);

		$GetNumRows->execute();

		return $GetNumRows->rowCount();

		

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

		$sql = "INSERT into $this->tablename (address,expiry)VALUES (:address,:expiry)";

		$insert = $this->con->prepare($sql);

		$insert->bindParam(":address",$this->formData);

		$insert->bindParam(":expiry",$expiry);

		$insert->execute();






	}

	function DeleteAddress(){

		$sql = "DELETE FROM $this->tablename WHERE expiry < UNIX_TIMESTAMP()";

		$delete = $this->con->prepare($sql);

		$delete->execute();

	}
}







?>