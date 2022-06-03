<?php include('header.php') ?>



		<div class="banner">
			<img src="images/resume.png" />
		</div>

		<div class="search">
			<form method='POST'>
				<input type="text" placeholder="Search Resume" name="search">
				<input type="submit" value="search">
			</form>
		</div>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "jobsite";
		$conn = new mysqli($servername, $username, $password, $dbname);

		if (isset($_POST['search'])) {
			$sql = "SELECT * FROM resume where (dob like '%" . $_POST['search'] . "%'  OR gender like '%" . $_POST['search'] .
			 "%' OR address like '%" . $_POST['search'] . "%' OR phone like '%" . $_POST['search'] . "%' OR skills like'%" . $_POST['search'] . "%') AND (visible =1)";
			
			$result = $conn->query($sql); 

			if (mysqli_num_rows($result)>0) {

			echo " <table>
			  <tr>
			    <th>Name</th>
			    <th>Skills</th>
				<th>Experience</th>
				<th>Education</th>
				<th>Date of Birth</th>
				<th>Gender</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Post Date</th>
				
			  </tr> ";
			//print_r($result);
			while ($row = $result->fetch_assoc()) {
				echo " <tr><td> <b> </b> " . $row["name"] . " </td><td><b>  </b>" . $row["skills"] . "</td><td> <b> </b>" . $row["experience"] . "</td><td><b> </b> " . $row["education"] . "</td><td><b></b>" . $row["dob"] . " </td><td><b> </b>" . $row["gender"] . "<td> <b> </b> " . $row["address"] . " </td><td><b> </b> " . $row["phone"] . " <td><b>  </b> " . $row["email"] . " </td><td><b> </b>" . $row["Post Date"] . "</td></tr>";
			}
			echo "</table>"; 
			}else{
				  echo "No match found!";

			  }


		}
		$conn->close();
		?>

		<div class="footer">
			Copyright 2022 @ Metrosoftbd.net
		</div>

	</div>
</body>
</html>
