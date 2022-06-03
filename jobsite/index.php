<?php include('header.php') ?>


		<div class="banner">
			<img src="images/istockphoto-1279104620-170667a.jpg" />
		</div>

		<div class="search">
			<form method='POST'>
				<input type="text" placeholder="Search Jobs" name="search">
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
			$sql = "SELECT * FROM job where (jobdscr like '%" . $_POST['search'] . "%'  OR skillrqd like '%" . $_POST['search'] .
				"%' OR exprqd like '%" . $_POST['search'] . "%' OR salaries like '%" . $_POST['search'] . "%') AND (visible =1)";
			$result = $conn->query($sql);
			echo " <table>
			  <tr>
				<th>Position</th>
				<th>Job Description</th>
				<th>Skills Required</th>
				<th>Experience</th>
				<th>Salary</th>
				<th>Post Date</th>
				<th>Action</th>
			  </tr> ";
			//print_r($result);
			if (mysqli_num_rows($result) != 0) {
				while ($row = $result->fetch_assoc()) {
					echo " <tr><td> " . $row["position"] . "</td><td> <b> </b>" . $row["jobdscr"] . "<td>   " . $row["skillrqd"] . " </td><td> " . $row["exprqd"] . " </td><td> " . $row["salaries"]  . "</td><td> " . $row["Post Date"] . "</td><td> " . ($row["userid"] == $_SESSION["userid"] ? '<a href="jobEntry.php?id='.$row["jobid"].'">Edit</a>' : 'na') . "</td></tr>";
				}
				echo "</table>";
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