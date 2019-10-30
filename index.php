<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>GitHub repositories search</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/styles.css" />
</head>

<body>
	<section id="form" class="container">
		<h1 class="mt-5">GitHub repositories search</h1>
		
		<p class="lead">Set search rules.</p>
		
		<form>
			<div id="rules">
			
				<div class="form-row rule">
					<div class="col-sm-3">
						<select class="form-control" required>
							<option value="" disabled selected hidden>Field...</option>
							<option value="1">size</option>
							<option value="2">forks</option>
							<option value="3">stars</option>
							<option value="4">followers</option>
						</select>
					</div>
					<div class="col-sm-3">
						<select class="form-control" required>
							<option value="" disabled selected hidden>Operator...</option>
							<option value="1">&lt;</option>
							<option value="2">=</option>
							<option value="3">&gt;</option>
						</select>
					</div>
					<div class="col-sm-3">
						<input 	class="form-control"
								type="number" required
								step="1" min="0"
								placeholder="Value..." />
					</div>

					<div class="col-sm-3">
						<button class="btn btn-danger float-right rule-delete">Delete</button>
					</div>
				</div>
				
			</div>
			<div class="form-row">
				<div class="col-sm-9">
					<button class="btn btn-primary" type="submit">Apply</button>
					<button class="btn btn-warning" id="rulesClear">Clear</button>
				</div>
				<div class="col-sm-3">
					<button class="btn btn-success float-right" id="rulesAdd">Add Rule</button>
				</div>
			</div>
		</form>
	</section>
	
	<script type="text/javascript" src="/js/scripts.js"></script>
</body>
</html>
