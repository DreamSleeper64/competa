<?php

$data = "https://api.unsplash.com/photos/?client_id=eafdf6947421b2ec6eeef5f89419e75a103944beedac2806682099646086a8bf";
	$response = file_get_contents($data);
	$decodeds = json_decode($response);


$returned_list = [];

	foreach($decodeds as $decoded) {
		array_push($returned_list, $decoded->urls->regular );
	}

	echo json_encode($returned_list);
?>