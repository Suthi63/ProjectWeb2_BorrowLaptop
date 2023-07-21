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
		<a href="index.html">หน้าหลัก</a>
					

	
    <h2>ระบบ Login</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form  action ="register_action.php" method="post">
			<h1>สร้างบัญชีผู้ใช้</h1>
			<span>สมัครสมาชิกเพื่อรับสิทธ์ขอบยืมโน็ตบุ๊ก</span>
			<input type="text" name="name_surname" placeholder="ชื่อ-นามสกุล" />
			<input type="text" name="Username_user" placeholder="Username" />
			<input type="text" name="Password_user" placeholder="Password" />
			<input type="email" name="Email_user" placeholder="Email" />
			<input type="text" name="number_user" placeholder="เบอร์โทรศัพท์" />
			<input type="submit">สมัครสมาชิก</input>
		</form>
	</div>

	<div class="form-container sign-in-container">
		<form action="login_action.php" method="post">
			<h1>เข้าสู่ระบบ</h1>
			<span></span>
			<input type="text" name="Username_user1" placeholder="Username" />
			<input type="password" name ="Password_user1" placeholder="Password" />
			
			<button  type="submit">เข้าสู่ระบบ></button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>ยินดีต้อนรับกลับ</h1>
				<p>หากต้องการเชื่อมต่อกับเราโปรดเข้าสู่ระบบด้วยข้อมูลส่วนบุคคลของคุณ</p>
				<button class="ghost" id="signIn">เข้าสู่ระบบ</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>ยินดีต้อนรับ</h1>
				<p>กดเพื่อสมัครสมาชิก</p>
				<button class="ghost" id="signUp">กดเพื่อสมัครสมาชิก</button>
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