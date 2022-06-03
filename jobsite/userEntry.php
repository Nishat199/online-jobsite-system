<!DOCTYPE html>
<html>
	<head>
		<title>  job site </title>
		<meta charset='utf-8'>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<div class="container">
			<div class="menu">
				<ul>
					<li><a href="index.php">Jobs</a></li>
					<li><a href="Employer.php">Resumes</a></li>
					<li><a href="AboutUs.php">About Us</a></li>
				</ul> 
			</div>
		
			<div class="banner">
				<img src="images/istockphoto-1279104620-170667a.jpg"/>	
			</div>
			<div class="search">

			<h2>User Entry Screen</h2>
			<form class="reg-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="input-group">
					<div class="user-label">Name:</div>
					<div class="user-input"><input type="text" name="name"></div>
				</div>
				<form class="reg-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="input-group">
					<div class="user-label">Phone:</div>
					<div class="user-input"><input type="text" name="phone"></div>
				</div>
				<form class="reg-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="input-group">
					<div class="user-label">Email:</div>
					<div class="user-input"><input type="text" name="email"></div>
				</div>
				<div class="input-group">
				<div class="user-label">Description: </div>
				<div class="user-input"><textarea name="description" rows="5" cols="40"></textarea></div>
                </div>
				

				<!--Packages Offered: <textarea name="comment" rows="5" cols="40"></textarea>
				<br><br> -->


				<input type="submit" name="submit" value="Enter">  
			</form>
        </div>

			<?php
				$name = $name = $phone = $email = $description= "";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$name = test_input($_POST["name"]);
					$phone = test_input($_POST["dob"]);
					$email = test_input($_POST["gender"]);
					$description = test_input($_POST["address"]);
                    
					//$gender = test_input($_POST["gender"]);
				}

				echo "<h2>Your Input:</h2>";
				echo $name."<br>";
				echo $phone."<br>";
				echo $email."<br>";
				echo $description."<br>";
                


				function test_input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "jobsite";

				if ($_SERVER['REQUEST_METHOD']=='POST')
				{
					try {
						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						// set the PDO error mode to exception
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
						$sql = "INSERT INTO users (userid, name, phone, email, description )
						
						VALUES (1, '{$name}', '{$phone}', '{$email}', '{$description}')";
						
						
						// use exec() because no results are returned
						$conn->exec($sql);
						echo "New record created successfully";
					} catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}
					$conn = null;		
				}
				

			?>

			<div class="footer">
				Copyright 2022 @ Metrosoftbd.net				
			</div>

		</div>

	</body>
</html> 