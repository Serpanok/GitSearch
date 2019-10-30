<?php

include 'functions.php';

header('Content-Type: application/json');

$response = array();

if( isset($_GET['field']) && count($_GET['field']) )
{
	$response['query'] = prepareQueryByArray($_GET);
	$response['items'] = getRepositoriesInfo($response['query']);
}

echo json_encode($response);
