<?php include('header.php') ?>


		
			<div class="banner">
				<img src="images/istockphoto-1279104620-170667a.jpg"/>	
			</div>
			<div class="search">

			<h2>Job  Entry Screen</h2>
			<form class="reg-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="input-group">
					<div class="user-label">Job Title:</div>
					<div class="user-input"><input type="text" name="position"></div>
				</div>
				<form class="reg-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="input-group">
					<div class="user-label">Job Description:</div>
					<div class="user-input"><input type="text" name="jobdscr"></div>
				</div>
				<form class="reg-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="input-group">
					<div class="user-label">Skill Required:</div>
					<div class="user-input"><input type="text" name="skillrqd"></div>
				</div>
				<div class="input-group">
				<div class="user-label">Experience Required: </div>
				<div class="user-input"><textarea name="exprqd" rows="5" cols="40"></textarea></div>
                </div>
				<div class="input-group">
					<div class="user-label">Salary:</div>
					<div class="user-input"><input type="text" name="salaries"></div>
				</div>
                <div class="input-group">
					<div class="user-label">Packages Offered:</div>
					<div class="user-input"><input type="text" name="comment"></div>
				</div>
				

				<!--Packages Offered: <textarea name="comment" rows="5" cols="40"></textarea>
				<br><br> -->


				<input type="submit" name="submit" value="Enter">  
			</form>
        </div>

			<?php
				$name = $position = $jobdscr = $skillrqd = $exprqd = $salaries= "";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$position = test_input($_POST["position"]);
					$jobdscr = test_input($_POST["jobdscr"]);
					$skillrqd = test_input($_POST["skillrqd"]);
					$exprqd = test_input($_POST["exprqd"]);
					$salaries = test_input($_POST["salaries"]);

					//$gender = test_input($_POST["gender"]);
				}

				echo "<h2>Your Input:</h2>";
				echo $position."<br>";
				echo $jobdscr."<br>";
				echo $skillrqd."<br>";
				echo $exprqd."<br>";
				echo $salaries."<br>";



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
						
						$sql = "INSERT INTO job (userid, position, jobdscr, skillrqd, exprqd, salaries )
						
						
						VALUES (1, '{$position}', '{$jobdscr}', '{$skillrqd}', '{$exprqd}', '{$salaries}')";
						
						// use exec() because no results are returned
						$conn->exec($sql);
						echo "New record created successfully";
					} catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}
					$conn = null;		
				}

				if ($_SERVER['REQUEST_METHOD']=='GET'){
					echo $_GET['id'];
				}
				

			?>

			<div class="footer">
				Copyright 2022 @ Metrosoftbd.net				
			</div>

		</div>

	</body>
</html> 