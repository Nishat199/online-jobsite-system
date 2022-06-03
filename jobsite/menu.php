<div class="menu">
			<ul>
				<li><a href="index.php">Jobs</a></li>
				<li><a href="Employer.php">Resumes</a></li>
				<li><a href="about.php">About Us</a></li>
				
				<?php if (isset($_SESSION['login'])) {
					echo '<li><a href="logout.php">Logout</a></li>';
					echo '<li><a title="profile" href="profile.php">' . $_SESSION['name'] . '</a></li>';
				}else{
					echo '<li><a href="login.php">Login</a></li>';
				}
				?>

			</ul>
		</div>