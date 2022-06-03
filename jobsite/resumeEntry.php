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

			<h2>Resume  Entry Screen</h2>
			<form class="reg-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="input-group">
					<div class="user-label">Name:</div>
					<div class="user-input"><input type="text" name="name"></div>
				</div>
				<form class="reg-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="input-group">
					<div class="user-label">Date of birth:</div>
					<div class="user-input"><input type="text" name="dob"></div>
				</div>
				<form class="reg-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="input-group">
					<div class="user-label">Gender:</div>
					<div class="user-input"><input type="text" name="gender"></div>
				</div>
				<div class="input-group">
				<div class="user-label">Address: </div>
				<div class="user-input"><textarea name="address" rows="5" cols="40"></textarea></div>
                </div>
				<div class="input-group">
					<div class="user-label">Phone:</div>
					<div class="user-input"><input type="text" name="phone"></div>
				</div>
                <div class="input-group">
					<div class="user-label">Email:</div>
					<div class="user-input"><input type="text" name="email"></div>
				</div>
				<div class="input-group">
					<div class="user-label">Skills:</div>
					<div class="user-input"><input type="text" name="skills"></div>
				</div>
				<div class="input-group">
					<div class="user-label">Experience:</div>
					<div class="user-input"><input type="text" name="experience"></div>
				</div>
                <div class="input-group">
					<div class="user-label">Education:</div>
					<div class="user-input"><input type="text" name="education"></div>
				</div>

				<!--Packages Offered: <textarea name="comment" rows="5" cols="40"></textarea>
				<br><br> -->


				<input type="submit" name="submit" value="Enter">  
			</form>
        </div>

			<?php
				$name = $name = $dob = $gender = $address= $phone= $email= $skills= $experience= $education = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$name = test_input($_POST["name"]);
					$dob = test_input($_POST["dob"]);
					$gender = test_input($_POST["gender"]);
					$address = test_input($_POST["address"]);
                    $phone = test_input($_POST["phone"]);
                    $email = test_input($_POST["email"]);
                    $skills = test_input($_POST["skills"]);
                    $experience = test_input($_POST["experience"]);
                    $education = test_input($_POST["education"]);
					//$gender = test_input($_POST["gender"]);
				}

				echo "<h2>Your Input:</h2>";
				echo $name."<br>";
				echo $dob."<br>";
				echo $gender."<br>";
				echo $address."<br>";
                echo $phone."<br>";
                echo $email."<br>";
                echo $skills."<br>";
                echo $experience."<br>";
                echo $education."<br>";


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
						
						$sql = "INSERT INTO resume (userid, name, dob, gender, address, phone, email, skills, experience, education )
						
						VALUES (1, '{$name}', '{$dob}', '{$gender}', '{$address}','{$phone}','{$email}','{$skills}','{$experience}','{$education}')";
						
						
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