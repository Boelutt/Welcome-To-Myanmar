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
	if(isset($_GET["w"])) {
		$w = $_GET["w"];
	} else {
		$w = "";
	}

	if(isset($_GET["c"])) {
		$c = $_GET["c"];
	} else {
		$c = 0;
	}

	if(isset($_GET["yearfrom"]) && $_GET["yearfrom"] > 0) {
		$yearfrom = $_GET["yearfrom"];
	} else {
		$yearfrom = "";
	}

	if(isset($_GET["yearto"]) && $_GET["yearto"] > 0) {
		$yearto = $_GET["yearto"];
	} else {
		$yearto = "";
	}
	$db = new PDO("sqlite:sample.db");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "select 
                    * 
			from 
				trips m
			inner join
				categories c
			on
				m.categoryid = c.categoryid
			where 
				title like ? ";
	if($c > 0) {
		$sql .= "and m.categoryid = ? ";
	}

	if($yearfrom > 0) {
		$sql .= "and year >= ? ";
	}

	if($yearto > 0) {
		$sql .= "and year <= ? ";
	}

	$sql .=	"order by tripid desc";

	$stmt = $db->prepare($sql);
	$index = 1;
	$stmt->bindValue($index++, "%" . $w . "%");
	if($c > 0) {
		$stmt->bindValue($index++, $c);
	}
	if($yearfrom > 0) {
		$stmt->bindValue($index++, $yearfrom);
	}
	if($yearto > 0) {
		$stmt->bindValue($index++, $yearto);
	}

	$stmt->execute();
	$rs = $stmt->fetchAll();

	$sql = "select * from categories order by categoryid";
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$categories = $stmt->fetchAll();
	?>
	
	<style type="text/css">
		

		.p-img{
			height: 300px;
			object-fit: cover;
		}

		.mm{
    		font-family: Arial;
    		font-size: 70px;
    		margin-bottom: 10px;
			margin-left: 30px;
    		font-weight: 500;
    		color: yellowgreen;
    		text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkgray;
    		animation: mymove 5s infinite;

		}

	</style>

</head>
<body>
<div class="container mt-5">
		<h1 class="mm" ><img src="https://guidable.co/wp-content/uploads/2020/08/gotocampaign3.jpg"  height="150px">  Welcome To Myanmar</h1>
		<form action="index.php">
			<div class="form-group">
				<select name="c" class="form-control">
					<option value="0">すべて</option>
					<?php foreach ($categories as $cate) { ?>
						<option value="<?= $cate["categoryid"] ?>"
							<?= $c == $cate["categoryid"] ? "selected" : "" ?>
							>
							<?= $cate["categoryname"] ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<input class="form-control" type="type" name="w" value="<?= $w ?>" placeholder="キーワード">
			</div>
			
			<div class="form-group">
				<input class="btn btn-block btn-primary"  type="submit" value="検索">
			</div>
		</form>


		<div class="row">
			<?php foreach ($rs as $d) { ?>
				<div class="col-md-4 col-sm-6 mb-3">
					<div class="card">
						<img src="<?= $d["image"] ?>" class="p-img" alt="...">
						<div class="card-body">
							<h5 class="card-title"><?= $d["title"] ?></h5>
							<p class="card-text"><?= $d["categoryname"] ?></p>
							<a href="detail.php?tripid=<?= $d["tripid"] ?>" style="background-image: url('https://media.istockphoto.com/photos/flag-of-myanmar-blowing-in-the-wind-picture-id1219362874?k=20&m=1219362874&s=612x612&w=0&h=c_3DPSB0_6q3tlXT3J0WViuT-7MTs4V1rDWdx0eofrE='); background-size: 80px; background-position: 90px;" class="btn btn-secondary">詳しく見る</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>