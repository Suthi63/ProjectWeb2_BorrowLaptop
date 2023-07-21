<?php
session_start();
session_destroy(); // ลบ session ทั้งหมด
header("location: index.html"); // redirect ไปยังหน้า login.php