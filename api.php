<?php
/**
* API Crypt/Decrypt | ThiWeb Live
* Author : Zerawmaster
*
* Contributor : Ghostfly
* Last update : Added decodeMultiple
*
*/
require 'functions.php';

$response = [];
$response['status'] = 'error';
$response['action'] = 'none';
$response['message'] = 'Erreur de type inconnue.';

if (isset($_GET['code'])) // If we call /api.php?code we force a code operation
	$action = 'code';
else if (isset($_GET['decode'])) // If we call /api.php?decode we force a decode operation
	$action = 'decode';
else if (isset($_GET['decodeMultiple'])) // If we call /api.php?decodeMultiple we force a decodeMultiple operation
	$action = 'decodeMultiple';
else // Else we let the api determine which operation to apply
	$action = 'auto';

// We receive the str on which we should work
if (isset($_POST['str'])){
	$str = trim($_POST['str']);
} else if (isset($_GET['str'])){
	$str = trim ($_GET['str']);
} else {
	$str = null;
}

if ($str == null) {
	$response['status'] = 'warning';
	$response['action'] = 'none';
	$response['message'] = 'Aucun texte n\'a été reçu.';
} else {
	if ($action == 'auto') {

		$header = substr($str, 0, 6);

		if ($header == "TWL2.1") {
			$response['status'] = 'error';
			$response['action'] = 'decode';
			$response['message'] = 'Vous semblez essayer de décrypter du TWL2.1 qui n\'est pas supporté.';
		}
		else if ($header == "TWL2.0" || $header == "TWL2.2" || $header == "TWL2.3")
			$action = 'decode';
		else
			$action = 'code';
	} else if ($action == 'code') {
		$response['status'] = 'success';
		$response['action'] = 'code';
		$response['message'] = code($str);

		incrementUsageCounter ();
	}
	else if ($action == 'decode') {

		try {
			$response['message'] = ["html" => decode($str), "raw" => decode($str, false)];
			$response['status'] = 'success';
			$response['action'] = 'decode';

			incrementUsageCounter ();
		}
		catch (Exception $e) {
			$response['status'] = 'error';
			$response['action'] = 'decode';
			$response['message'] = $e->getMessage();
		}

	} else if($action == 'decodeMultiple') {

		$result = "";
		$coded = "";

		$str = explode(',', $str);
		$countStr = count($str)-1;

		foreach($str as $k => $code){
			if($k !== $countStr){

				try {
					$result .= decode($code, false) . ","; // We decode every string separated with a comma for Extension
					$coded .= $code . ",";
				} catch(Exception $e) {
					$result .= $e->getMessage() . ",";
					$coded .= $code . ",";
				}

			} else {
				// There is only one str to decode so no comma
				try {
					$result .= decode($code, false);
					$coded .= $code;
				} catch (Exception $e){
					$result .= $e->getMessage();
					$coded .= $code;
				}

			}
		}

		$response['message'] = $result;
		$response['coded'] = $coded;
		$response['status'] = 'success';
		$response['action'] = 'decodeMultiple';

	}

}

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');

header('Content-Type: text/json; charset=utf-8');

echo json_encode($response, JSON_FORCE_OBJECT);
