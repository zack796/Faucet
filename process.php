<?php 

$form = $_POST;

if(isset($form["address"])){

	include("class.php");
	include("api.php");


	$conection = new Conection();

	$conection->Conect();

	$conection->GetDataForm($form["address"]);

	if($conection->Filteraddress() == 0){
		//die("error");
	}


	if($conection->CheckIfAddressExist() > 0){

		echo "direccion existe en db";

		$deleted = $conection->DeleteAddress();
		//Nolambo == if the address existed then reditect to the main home with error message
		header("Location:index.php?error=Nolambo");

	}else
	{
		echo $conection->InsertData();

		//Put here the trtl api

		$reward = new EggdraApi();

		$reward->SendRain($form["address"]);

		$hash = $reward->SendRain($form["address"]);

		echo $conection->CheckIfAddressExist();

		header("Location:index.php?lambo=$hash");

	}


}else{
	echo "error";
}

?>