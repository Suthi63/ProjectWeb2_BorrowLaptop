<?php
session_start(); // เปิดใช้งาน session
if (isset($_SESSION['user_login'])) { // ถ้าเข้าระบบอยู่
    header("location: index.html"); // redirect ไปยังหน้า index.php
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main1.css">
</head>
<body>
	
	
    <h2>Sign in</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form  action ="register_action.php" method="post">
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="text" name="name_surname" placeholder="ชื่อ-นามสกุล" />
			<input type="text" name="Username_user" placeholder="Username" />
			<input type="password" name="Password_user" placeholder="Password" />
			<input type="email" name="Email_user" placeholder="Email" />
			<input type="text" name="number_user" placeholder="เบอร์โทรศัพท์" />
			<input type="submit">สมัครสมาชิก</input>
		</form>
	</div>

	<div class="form-container sign-in-container">
		<form action="login_action.php" method="post">
			<h1>Sign in</h1>
			<span>or use your account</span>
			<input type="text" name="Username_user1" placeholder="Username" />
			<input type="password" name ="Password_user1" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button  type="submit">เข้าสู่ระบบ></button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script>
	const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
container.classList.remove("right-panel-active");
});
</script>



    

</body>
</html>