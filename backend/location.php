<?php

	require_once 'database.php';

	$db = new Database();

	// get all states
	if(isset($_GET['getState']) && $_GET['getState'] == 'all')
	{
		$states = $db->fetch("states");

		$json = array("status" => 200, "data" => $states);

		echo json_encode($json);
	}

	// get all lgas
	elseif(isset($_GET['getLga']) AND $_GET['getLga'] != "")
	{
		$state = $_GET['getLga'];

		$lgas = $db->fetchWhere('lga', 'state_id', $state, "*");

		$json = array("status" => 200, "data" => $lgas);

		echo json_encode($json);
	}
