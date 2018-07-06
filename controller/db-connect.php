<?php

	$mysqli = mysqli_connect("127.0.0.1", "root", "", "shoppingCart");

		if($mysqli == false){
    	echo 'not able to connect';
		}

	function listUsers($mysqli) {
	  $users = array();
	  $usersRegistered = mysqli_query($mysqli, "SELECT * FROM DBUSERS");
	  while($user = mysqli_fetch_assoc($usersRegistered)) {
	      array_push($users,$user);
	   }
	   return $users;
	}

	function executeQuery($mysqli, $statement) {
    return mysqli_query($mysqli, $statement);
	}

	function databaDetails($mysqli, $statement) {
	  $tables = array();
	  $tablesRegistered = mysqli_query($mysqli, $statement);
	  while($table = mysqli_fetch_assoc($tablesRegistered)) {
	      array_push($tables,$table);
	   }
	   return $tables;
	}
?>