<?php
$msg = "";
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
	header("Location: index.php");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
	$userid = $_SESSION['userid'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];

	$sql = "UPDATE users SET name='$name', phone='$phone' WHERE userid = '$userid'";
	$result = $conn->query($sql);
	if ($result) {
		$msg = "Record updated successfully";
	} else {
		$msg = "Error updating record: " . $conn->error;
	}
}


if (true) {
	$userid = $_SESSION['userid'];
	$sql = "SELECT * FROM users WHERE userid = '$userid'";
	$result = $conn->query($sql);
	if ($result) {
		$data = $result->fetch_assoc();
	}
}

?>

<!doctype htlm>

<html lang='en'>

<head>

	<title> Resume Details </title>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="responsive.css">
</head>

<body>

	<section class="header_section">
		<div class="container">
			<div class="row">
				<div class="col-6">
					<?php include('menu.php') ?>

				</div>

			</div>
		</div>
	</section>

	<section class="body_section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php if (isset($_POST['edit'])) {


					?>
						<form class="reg-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
							<div class="body_portion">

								<div class="input-group">
									<div class="user-label">Name</div>
									<div class="user-input"><input type="text" placeholder="Enter Name" name="name" value="<?php echo $data['name'] ?>"></div>
								</div>
								<div class="input-group">
									<div class="user-label">Phone No:</div>
									<div class="user-input"><input type="text" placeholder="Enter phone no" name="phone" value="<?php echo $data['phone'] ?>"></br></div>
								</div>
								<div class="input-group">
									<div class="user-label">Email:</div>
									<div class="user-input"><input type="text" placeholder="Enter email" name="email" value="<?php echo $data['email'] ?>"></br></div>
								</div>
								<div class="input-group">
									<div class="user-label">Description: </div>
									<div class="user-input"><input type="text" placeholder="Enter description" name="description" value="<?php echo $data['description'] ?>"></br></div>
								</div>


								<input name="update" type="submit" value="Update">

							</div>
						</form>
					<?php
					}
					if (!isset($_POST['edit'])) {
					?>
						<div class="body_portion">
							<div class="input-group">
								<div class="user-label">Name: </div>
								<div class="user-input"> <label for="name"></label><?php echo $data['name'] ?></div>
							</div>
							<div class="input-group">
								<div class="user-label">Phone: </div>
								<div class="user-input"> <label for="name"></label><?php echo $data['phone'] ?></div>
							</div>
							<div class="input-group">
								<div class="user-label">Email: </div>
								<div class="user-input"> <label for="name"></label><?php echo $data['email'] ?></div>
							</div>
							<div class="input-group">
								<div class="user-label">Description: </div>
								<div class="user-input"> <label for="name"></label><?php echo $data['description'] ?></div>
							</div>



							<form method='POST'>
								<div class="button">
									<button name="edit" class="button button1">Edit</button>
								</div>

							</form>
						</div>
					<?php

					}
					?>
				</div>
			</div>
		</div>
	</section>
	<div id="snackbar"><?php echo $msg ?></div>

	<section class="footer_section">
		<div class="footer">
			Copyright 2022 @ Metrosoftbd.net
		</div>

	</section>
	<script>
		<?php if (isset($_POST['update'])) {
			echo 'myFunction()';
		} ?>

		function myFunction() {
			var x = document.getElementById("snackbar");
			x.className = "show";
			setTimeout(function() {
				x.className = x.className.replace("show", "");
			}, 3000);
		}
	</script>
</body>

</html>