<?php
	require_once 'auth/checkLogin.php';
	if(!isLoggedIn()) header('Location: auth/login.php');
	if(!isset($_GET['vid']))
	{
		echo 'Link error';
		return;
	}
	else
	{
		
		$db = new PDO('mysql:host=localhost;dbname=studycampus', "root", "");
		$stmt = $db->prepare("SELECT video_time from video_pause WHERE user_id = ". $_SESSION['id'] ." AND video_id = ". $_GET['vid'] .";");
		$stmt->execute();
		$pauses = $stmt->fetchAll();

		$q = "SELECT topic_name, resource_url from video_topic_breakpoint WHERE video_id = ". $_GET['vid'] . ";";
		$stmt = $db->prepare($q);
		$stmt->execute();
		$topics = $stmt->fetchAll();
		$db = null;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	<?php require_once 'layouts/navbar.php' ?>
	<div class="container">
		<table class="table table-hover mt-4">
			<thead>
				<th>#</th>
				<th>Topic Name</th>
				<th>Extra Help Resources</th>
			</thead>
			<tbody>
				<tr>
					
				</tr>
			</tbody>
		</table>
	</div>






	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>