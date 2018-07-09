<?php 

	include 'controller/db-connect.php';

	$query = "SELECT * FROM Stores";

	$json = array();
	$result = mysqli_query ($mysqli, $query);
	while($row = mysqli_fetch_array ($result))     
	{
	    $bus = array(
	        'lat' => $row['StoreLat'],
	        'lng' => $row['StoreLng'],
	        'storeID' => $row['StoreID']
	    );
	    array_push($json, $bus);
	}

	$jsonstring = json_encode($json, JSON_NUMERIC_CHECK);
	echo $jsonstring;
	die(); 		
 