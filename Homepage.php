<?php
session_start();
if (!isset($_SESSION['user_login'])) { // ถ้าไม่ได้เข้าระบบอยู่
    header("location: register.php"); // redirect ไปยังหน้า login.php
    exit;
}
include_once('./function.php');
$objCon = connectDB();
$user = $_SESSION['user_login'];

$_SESSION['user_login'] = array(
        
   'name_surname' => $res['name_surname'],
   'level' => $res['u_level']
);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Boocic</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader --> 
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo"> <a href="Homepage.php">Borrow gaming laptop</a> </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <ul class="menu-area-main">
                              
                              <li> <a href="logout_action.php">ออกจากระบบ</a></li>   
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner --> 

      </header>
      <?php 
      
         if(isset($_GET['search'])&&$_GET['search']!=''){
            $sql = "SELECT * FROM laptop_borrow WHERE name_laptop = '".$_GET['search']."'";

         }else{
            $sql = "SELECT * FROM laptop_borrow";
         }
            $result = mysqli_query($objCon,$sql);
      ?>

      <!-- end header -->
      

      
<!-- Download -->
      
      <!-- end Download -->

<!-- service --> 
      
      <!-- end service -->
      <!-- our blog -->
      <div id="blog" class="blog">
         <div class="container">
         <div class="titlepage">
                     <h2>LaptopList</h2>
                     
         </div>
         <script>
         $(document).ready(function(){
         $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
         });
         });
         </script>
         <h1>โน็ตบุ๊คยืมฟรี</h1>
         <form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">

            <table width="599" border="1">
               <tr>
                  <th>Keyword (id_laptop, name_laptop) :
                  <form method='get'>
                     <input type="text" name='search' placeholder="Search for names.." title="Type in a name">
                     <input type="submit" value="Search">
                  </form>
                  </th>
               </tr>
            </table>
         
            </form>
            <table>
                  <tr>
                     <td>Picture</td>
                    <td width="5%">id_laptop</td>
                    <td width="25%">name_laptop</td>
                    <td width="25%">remaining_number </td>
                    <td>ยืม</td>
                </tr>
                <?php
                while($data = mysqli_fetch_assoc($result)){
                  echo "<tr>";
                  echo "<td><img src='images/images.jfif'></td>";
                  echo "<td>".$data['id_laptop']."</td> <td>".$data['name_laptop']."</td> <td>".$data['remaining_number']."</td><td></td>";
                  
                  echo "</tr>";
                  
                }
                ?>
               
            </table>
      </div>
      <center><br><a class ="taga" href ="Homepage.php">กดเพื่อยืม</a></center>
                  
         <?php 
         if(isset($_GET['m'])){
            $sql = "SELECT * FROM laptop_borrow WHERE id_laptop ='".$_GET['m']."'";
            $re = mysqli_query($objCon,$sql);
            $data = mysqli_fetch_assoc($re);
            $insertSQL = "INSERT INTO `borrowinglaptop`(`user`, `laptop`) VALUES ('".$user."','".$data['id_laptop']."')";
            echo $insertSQL;

         }
         ?>      
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  
               </div>
            </div>
            <div class="row">
              <?php 
                while ($data = mysqli_fetch_assoc($result)) {
                  echo "<div class='col-xl-6 col-lg-6 col-md-6 col-sm-12'>
                  <div class='blog-box'>'
                     <figure><img src='images/blog-image0.jpg' alt='#'/>";
                     echo "<span>".$data['name_laptop']."</span>";
                     echo"</figure>
                     <div class='travel'>
                        <a href='?m=".$data['id_laptop']."'><span>Number in stock: ".$data['remaining_number']."</span>
                     </div>
                     <h3>".$data['name_laptop']."</h3>
                        </a>
                  </div>
             </div>";
               }
                if(isset($_GET['id_laptop'])){  
                  $sqll = "UPDATE `borrowinglaptop` SET `borrowID`='',`user`=[value-2],`laptop`='".$_GET['id_laptop']."' WHERE 1";
                  echo $sqll;
                }
              ?>
            </div>
         </div>
      </div>
      <!-- end our blog -->
      <!-- Testimonial -->
      <div id="contact" class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h3>Contact Us</h3>
                  </div>
               </div>
            </div>
            <div class="row">
             
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 offset-md-3">
                  <div class="contact">
                     
                     <form>
                        <div class="row">
                           <div class="col-sm-12">
                              <input class="contactus" placeholder="Name" type="text" name="Name">
                           </div>
                           <div class="col-sm-12">
                              <input class="contactus" placeholder="Phone" type="text" name="Email">
                           </div>
                           <div class="col-sm-12">
                              <input class="contactus" placeholder="Email" type="text" name="Email">
                           </div>
                           <div class="col-sm-12">
                              <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                           </div>
                           <div class="col-sm-12">
                              <button class="send">Send</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end Testimonial --> 
      <!--  footer --> 
      <footr>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Address</h3>
                        <i><img src="icon/3.png">Locations</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Menus</h3>
                        <i><img src="icon/2.png">Locations</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Useful Linkes</h3>
                        <i><img src="icon/1.png">Locations</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Social Media </h3>
                        <ul class="contant_icon">
                           <li><img src="icon/fb.png" alt="icon"/></li>
                           <li><img src="icon/tw.png" alt="icon"/></li>
                           <li><img src="icon/lin(2).png" alt="icon"/></li>
                           <li><img src="icon/instagram.png" alt="icon"/></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 width">
                     <div class="address">
                        <h3>Newsletter </h3>
                        <input class="form-control" placeholder="Enter your email" type="type" name="Enter your email">
                        <button class="submit-btn">Subscribe</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Free html Templates</a></p>
            </div>
         </div>
      </footr>
      <!-- end footer -->
      <!-- Javascript files--> 
      <script src="js/jquery.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.bundle.min.js"></script> 
      <script src="js/jquery-3.0.0.min.js"></script> 
      <script src="js/plugin.js"></script> 
      <!-- sidebar --> 
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script src="js/custom.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script> 
   </body>
</html>