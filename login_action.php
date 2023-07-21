<?php
session_start(); // เปิดใช้งาน session
if (isset($_SESSION['user_login'])) { // ถ้าเข้าระบบอยู่
    header("location: index.php"); // redirect ไปยังหน้า Homepage.php
    exit;
}
include_once("./function.php");
$objCon = connectDB(); // เชื่อมต่อฐานข้อมูล
$username = mysqli_real_escape_string($objCon, $_POST['Username_user1']); // รับค่า username
$password = mysqli_real_escape_string($objCon, $_POST['Password_user1']); // รับค่า password

$strSQL = "SELECT * FROM register WHERE Username_user = '$username' AND Password_user = md5('$password')";
$objQuery = mysqli_query($objCon, $strSQL);
$row = mysqli_num_rows($objQuery);
if($row) {
    $res = mysqli_fetch_assoc($objQuery);
    $_SESSION['user_login'] = array(
        
        'name_surname' => $res['name_surname'],
        'level' => $res['u_level']
    );
    
    echo '<script>alert("ยินดีต้อนรับคุณ ', $res['name_surname'],'");window.location="Homepage.php";</script>';
} else {
    echo '<script>alert("username หรือ password ไม่ถูกต้อง!!");window.location="longin.php";</script>';
}