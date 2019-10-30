<?php

function prepareQueryByArray(&$data)
{
	$query = array();
	
	if( isset($data['field']) && count($data['field']) )
	{
		foreach($data['field'] as $i => $field)
		{
			if( !isset($data['operator'][$i]) || !isset($data['value'][$i]) )
			{
				continue;
			}

			$field = getFieldName($field);
			$operator = getOperatorName($data['operator'][$i]);
			$value = intval($data['value'][$i]);

			if( $field === null || $operator === null || $value < 0)
			{
				continue;
			}

			$query[] = $field . ':' . $operator . $value;
		}
	}
	
	return implode('+', $query);
}

function getRepositoriesInfo($query)
{
	$response = array();
	
	$result = apiRequest('https://api.github.com/search/repositories?q=' . $query);
	
	foreach($result->items as $i=>$repo)
	{		
		$response[] = array(
			'full_name'		=> $repo->full_name,
			'name'			=> $repo->name,
			'size'			=> $repo->size,
			'forks_count'	=> $repo->forks_count,
			'followers'		=> $repo->watchers,
			'stars'			=> $repo->watchers_count
		);
	}
	
	return $response;
}

function apiRequest($url)
{
	$request = curl_init();
	curl_setopt($request, CURLOPT_URL, $url);
	curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($request, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

	$result = json_decode( curl_exec($request) );

	curl_close($request);
	
	return $result;
}

function getFieldName($code)
{
	switch($code)
	{
		case 1:
			return 'size';
		case 2:
			return 'forks';
		case 3:
			return 'stars';
		case 4:
			return 'followers';
	}
	
	return null;
}

function getOperatorName($code)
{
	switch($code)
	{
		case 1:
			return '<';
		case 2:
			return '';
		case 3:
			return '>';
	}
	
	return null;
}

function formatBytes($bytes, $precision = 2)
{ 
    $units = array('b', 'kb', 'mb', 'gb', 'tb');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1); 

    return round($bytes, $precision) . $units[$pow]; 
}
