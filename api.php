<?php 

require("vendor/autoload.php");

use TurtleCoin\Walletd;



class EggdraApi{



	function SendRain($SendAddressToApi){


	$config = [
    	'rpcHost'     => 'http://127.0.0.1',
    	'rpcPort'     => 8070,
    	'rpcPassword' => 'rpcpassword',
	];

	$walletd = new Walletd\Client($config);

	

	$anonymity = 0;
	$fee = 10;
	$addresses = null;
	$unlockTime = null;
	$extra = null;
	$paymentId = "";
	$changeAddress = null;

	$transfers = [
    ["address" => "$SendAddressToApi", "amount"  => 100],
	];

	$response = $walletd->sendTransaction($anonymity, $transfers, $fee, $addresses, $unlockTime, $extra, $paymentId, $changeAddress);

	$json = $response->getBody()->getContents();

	$obj = json_decode($json,true);



	$hash = $obj["result"]["transactionHash"];

		if(isset($hash)){
	return $hash;
		}else{


	return "error";
}





	}





}



?>