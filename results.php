<?php

include 'app/functions.php';

$results = array();

if( isset($_GET['field']) && count($_GET['field']) )
{
	$query = prepareQueryByArray($_GET);
	$results = getRepositoriesInfo($query);
}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Results - GitHub repositories search</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/styles.css" />
</head>

<body>
	<section id="form" class="container">
		<h1 class="mt-5">Results - GitHub repositories search</h1>
		
		<a href="/">back</a>
		
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Size</th>
					<th scope="col">Forks</th>
					<th scope="col">Followers</th>
					<th scope="col">Stars</th>
				</tr>
			</thead>
			<?php
			
			foreach($results as $repo)
			{
				printf('
			<tbody>
				<tr>
					<td><a href="https://github.com/%s" title="%s" target="_blank">%s</a></td>
					<td>%s</td>
					<td>%d</td>
					<td>%d</td>
					<td>%d</td>
				</tr>
			</tbody>',
					   $repo["full_name"],
					   $repo["full_name"],
					   $repo["name"],
					   formatBytes($repo["size"]),
					   $repo["forks_count"],
					   $repo['followers'],
					   $repo['stars']
				);
			}
			
			?>
		</table>
		
		<a href="/">back</a>
	</section>
</body>
</html>
