<?php 

$form = $_POST;

if(isset($form["address"])){

	include("class.php");


	$conection = new Conection();

	$conection->Conect();

	$conection->GetDataForm($form["address"]);

	if($conection->Filteraddress() == 0){
		die("error");
	}


	if($conection->CheckIfAddressExist() > 0){

		echo "direccion existe en db";

		$deleted = $conection->DeleteAddress();
		var_dump($deleted);

	}else
	{
		echo $conection->InsertData();

		echo "Put here the trtl api";

		echo $conection->CheckIfAddressExist();

		header("Location:form.php");

	}


}else{
	echo "error";
}

?>