<?php
session_start();

//
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
	header("Location: index.php");
}
?>
<!doctype htlm>

<head>
	<title> job site </title>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
	<div class="container">

	<?php include('menu.php')?>


		<div class="banner">
			<img src="images/istockphoto-1279104620-170667a.jpg" />
		</div>
		<form>
			<div class="search btn">
				<input id="phone" type="text" placeholder="phone no" name="search">
				<input id="loginBtn" type="submit" value="login">
			</div>
			<div class="otp-area">
				<div class="box">
					<input id="code" type="text" placeholder="" name="code">

				</div>
				<div class="coundown"></div>
				<div class="search btn">
					<input id="otpSubmitBtn" onClick="checkOpt();this.disabled=true;" type="submit" value="submit">

				</div>
		</form>
	</div>
	<div class="footer">
		Copyright 2022 @ Metrosoftbd.net
	</div>

	</div>
</body>
<script>
	var loginButton = document.getElementById('loginBtn');
	var phone = document.getElementById('phone');


	loginButton.addEventListener('click', function(event) {
		event.target.disabled = true;
		sendOtp();

	});

	function resendOtp() {
		sendOtp();
		document.getElementById('otpSubmitBtn').style.display = 'block';

	}

	function sendOtp() {
		const regexExpression = /(^(01){1}[3456789]{1}(\d){8})$/;
		if (phone.value.match(regexExpression)) {
			/* Data which will be sent to server */
			var number = phone.value;
			$.post("otp.php", {
					phone: number
				},
				function(data, status) {
					if (data == true) {

						document.querySelector('.otp-area').style.display = 'block';
						document.querySelector('.coundown').innerHTML = "otp has been send! <span id='timer'>50</span>sec left.";

						countdown();
					} else {
						document.querySelector('.otp-area').style.display = 'block';
						document.getElementById('otpSubmitBtn').style.display = 'none';
						document.getElementById('code').style.display = 'none';

						document.querySelector('.coundown').innerHTML = data;
					}
				});

		} else {
			phone.value = '';
			phone.placeholder = 'enter a valid number!';
		}

	}



	function checkOpt() {

		event.target.disabled = true;
		const regexExpression = /(^(\d){4})$/;
		var code = document.getElementById('code');

		if (code.value.match(regexExpression)) {
			var otpCode = code.value;
			$.post("otp.php", {
					otp: otpCode
				},
				function(data, status) {
					// alert("Data: " + data + "\nStatus: " + status);
					if (data == true) {
						window.location.href = "index.php";
					} else {
						alert(data);
					}
				});
		} else {
			code.value = '';
			code.placeholder = 'enter a valid otp!';
		}

	}


	function countdown() {
		var seconds = 10;

		function tick() {
			var timer = document.getElementById("timer");
			seconds--;
			timer.innerHTML =
				"0:" + (seconds < 10 ? "0" : "") + String(seconds);
			if (seconds > 0) {
				setTimeout(tick, 1000);
			} else {
				document.querySelector(".coundown").innerHTML += `
                <a id="resend" onClick="resendOtp(); this.disabled=true;">Resend</a>
            `;
				document.getElementById("timer").innerHTML = "00.00";
				document.getElementById('otpSubmitBtn').style.display = 'none';

			}
		}
		tick();
	}
</script>

</html>