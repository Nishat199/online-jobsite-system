<!doctype htlm>

<html lang='en'>

<head>

	<title>  Resume Details </title>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="responsive.css">
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	
</head>
<body>

<section class="header_section">
	<div class="container">
		<div class="row">
			<div class="col-6">
				<div class="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="Employer.php">Employer</a></li>
					<li><a href="JobSeeker.php">Job Seeker</a></li>
					<li><a href="AboutUs.php">About Us</a></li>
				</ul> 
				</div>
			</div>
			<div class="col-6">
				<div class="search">
					<form method='POST'>
					<input type="text" placeholder="Search here" name="name">
					<input type="submit" value="search">
				</form>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="photo">
 	<img src="images/123.png"  />
</div>

<section class="body_section">    
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="body_portion">
			       <p><br>Name-Fariha Akther </br>
                      <br>Date of birth-4.09.1994 </br>
                      <br>Gender-Female </br>
                      <br>Address-Mohammadpur,Dhaka </br> 
					  <br>Phone-01712357891 </br>
					  <br>Email-fariha@gmail.com </br>
					  <br>Skills-1)Good knowledge on programming languages(C++, C#, javascript)
								2) Database analyzing and knowledge on web application
								3)Analyzing algorithms and knowledge in Machine Learning
								4) High enthusiasm in problem solving </br>
					  <br>Experience- Worked as a programer in "abc" company</br>
					  <br>Education- 1)Bachelor of Computer Science and Engineering (American International
									University Bangladesh )
									2)Higher Secondary Certificate Dhaka Mohammadpur Preparatory School and College ,2015 
									3)Secondary School Certificate Dhaka Mirpur Girls Ideal Laboratory Institute, 2013 </br>
                  </p>
                  <div class="button">
					<form method='POST'>
					<button class="button button1">Edit</button>
					<button class="button button1">Save</button>
                    </form>
			</div>
			</div>
		</div>
	</div>
</section>

<section class="footer_section">
	<div class="container">
		<div class="row">
			<div class="col-6">
				<div class="footer_text">
				   <p class="copyright"> <marquee> Copyright 2022 @ Metrosoftbd.net </marquee></p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "jobsite";
		$conn = new mysqli($servername, $username, $password, $dbname);
	
	$conn = mysqli_connect("localhost", "root", "", "jobsite");
	$image_details  = mysqli_query($conn, "SELECT * FROM resume_table");
     while ($row = mysqli_fetch_array($image_details)) {     
		
      	echo "<img src='images/".$row['imagename']."' >";   
      
    } 
	?>    
</body>
</html>