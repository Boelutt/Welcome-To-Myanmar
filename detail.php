<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<link rel="icon" href="atom.png" type="atom.png" sizes="16x16">
	<title>Welcome To Myanmar</title>
	<?php
		$tripid = $_GET["tripid"];

		$db = new PDO("sqlite:sample.db");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select * from trips m inner join categories c on m.categoryid = c.categoryid where tripid = ?";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(1, $tripid);
		$stmt->execute();
		$d = $stmt->fetch();
	?>
	<style type="text/css">
		.thum {
			border-radius: 10%;
			margin: 10px;
		}
	</style>
</head>
<body >
<div class="container col-8 mt-7">
	
	
	<div class="jumbotron">
	<button class="btn btn-primary" style="background-image: url('https://media.istockphoto.com/photos/flag-of-myanmar-blowing-in-the-wind-picture-id1219362874?k=20&m=1219362874&s=612x612&w=0&h=c_3DPSB0_6q3tlXT3J0WViuT-7MTs4V1rDWdx0eofrE='); background-size: 80px; background-position: 70px;"onclick="history.back()">戻る</button>
		<h1 class="display-4"><?= $d["title"] ?><img class="thum" src="<?= $d["image"] ?>" height="150px"></h1>
		<table class="table">
			
			<tr>
				<th>カテゴリー</th><td><?= $d["categoryname"] ?></td>
			</tr>
			<tr>
				<th></th>
				<td>
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $d["youtube"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</td>

			</tr>
			<tr>
				<th>アドレス</th><td><?= $d["region"] ?></td>
			
			</tr>
		</table>
	</div>
</div>
</body>
</html>