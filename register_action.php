<?php
include_once('./function.php');
$objCon = connectDB();

$data = $_POST;
$name_surname = $data['name_surname'];
$Username_user = $data['Username_user'];
$Password_user = md5($data['Password_user']); // เข้ารหัสด้วย md5
$Email_user = $data['Email_user'];
$number_user = $data['number_user'];

$strSQL = "INSERT INTO 
register(
    `name_surname`,
    `Username_user`,
    `Password_user`, 
    `Email_user`,
    `number_user`
) VALUES (
    '$name_surname', 
    '$Username_user', 
    '$Password_user', 
    '$Email_user',
    '$number_user'
)";

$objQuery = mysqli_query($objCon, $strSQL) or die(mysqli_error($objCon));
if ($objQuery) {
    echo '<script>alert("ลงทะเบียนเรียบร้อยแล้ว");window.location="longin.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด");window.location="register.php";</script>';
}

