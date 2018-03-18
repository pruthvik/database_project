<?php
 session_start();
$dbUser="root";
$dbPass="";
$dbDatabase="test1";
$dbHost="localhost";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);
if(isset($_POST['confirmbooking']))
{
   $fromlocation=$_POST['fromlocation'];
   $tolocation=$_POST['tolocation'];
   $typeoftransport=$_POST['typeoftransport'];
   $journeydate=$_POST['journeydate'];
   $numberofpeople=(int)$_POST['numberofpeople'];
    $seats_id=$_POST['seats_id'];
    $package_idquery=mysqli_query($dbConn,"SELECT package_id FROM packages WHERE package_fromlocation='$fromlocation' && package_tolocation='$tolocation' && package_typeoftransport='$typeoftransport' ");
  
    while($row=mysqli_fetch_assoc($package_idquery))
    {
        $package_id=$row['package_id'];
    }
    $sessionid=session_id();
    $user_idquery=mysqli_query($dbConn,"SELECT active_user_id FROM activeusers WHERE session_id='$sessionid'");
    while($row=mysqli_fetch_assoc($user_idquery))
    {
        $user_id=$row['active_user_id'];
    }
    
    
    $today=date('Y-m-d H:i:s');
   
   
   
    
   mysqli_query($dbConn,"INSERT INTO booking_packages(user_id,bookingp_id,booking_seats_id,booking_numberofpeople,booking_packages_bdate,status) VALUES($user_id,$package_id,$seats_id,$numberofpeople,'$today','booked') ");
      
      $booking_cidquery=mysqli_query($dbConn,"SELECT * FROM booking_packages WHERE booking_packages_bdate='$today' ");
      while($row=mysqli_fetch_assoc($booking_cidquery))
      {
          $booking_cid=$row['booking_packages_id'];
      }
     
     if($numberofpeople>=1)
     {
         $nameofpassenger=mysqli_real_escape_string($dbConn,$_POST['nameofpassenger1']);
         $emailofpassenger=mysqli_real_escape_string($dbConn,$_POST['emailofpassenger1']);
         $ageofpassenger=mysqli_real_escape_string($dbConn,$_POST['ageofpassenger1']);
         $adhaarofpassenger=mysqli_real_escape_string($dbConn,$_POST['adhaarofpassenger1']);
         $mobileofpassenger=mysqli_real_escape_string($dbConn,$_POST['mobileofpassenger1']);
         
                  mysqli_query($dbConn,"INSERT INTO bookingp_customers(booking_cid,name,email,age,adhaar_id,mobile,status) VALUES($booking_cid,'$nameofpassenger','$emailofpassenger','$ageofpassenger','$adhaarofpassenger','$mobileofpassenger','booked')");
              
     }
     if($numberofpeople>=2)
     {
         
  
         $nameofpassenger2=mysqli_real_escape_string($dbConn,$_POST['nameofpassenger2']);
         $emailofpassenger2=mysqli_real_escape_string($dbConn,$_POST['emailofpassenger2']);
         $ageofpassenger2=mysqli_real_escape_string($dbConn,$_POST['ageofpassenger2']);
         $adhaarofpassenger2=mysqli_real_escape_string($dbConn,$_POST['adhaarofpassenger2']);
         $mobileofpassenger2=mysqli_real_escape_string($dbConn,$_POST['mobileofpassenger2']);
 mysqli_query($dbConn,"INSERT INTO bookingp_customers(booking_cid,name,email,age,adhaar_id,mobile,status) VALUES($booking_cid,'$nameofpassenger2','$emailofpassenger2','$ageofpassenger2','$adhaarofpassenger2','$mobileofpassenger2','booked')");
        
    
     }
     if($numberofpeople>=3)
     {
         $nameofpassenger3=mysqli_real_escape_string($dbConn,$_POST['nameofpassenger3']);
         $emailofpassenger3=mysqli_real_escape_string($dbConn,$_POST['emailofpassenger3']);
         $ageofpassenger3=mysqli_real_escape_string($dbConn,$_POST['ageofpassenger3']);
         $adhaarofpassenger3=mysqli_real_escape_string($dbConn,$_POST['adhaarofpassenger3']);
         $mobileofpassenger3=mysqli_real_escape_string($dbConn,$_POST['mobileofpassenger3']);
 mysqli_query($dbConn,"INSERT INTO bookingp_customers(booking_cid,name,email,age,adhaar_id,mobile,status) VALUES($booking_cid,'$nameofpassenger3','$emailofpassenger3','$ageofpassenger3','$adhaarofpassenger3','$mobileofpassenger3','booked')");
     }
     
     if($numberofpeople>=4)
     {
          $nameofpassenger4=mysqli_real_escape_string($dbConn,$_POST['nameofpassenger4']);
         $emailofpassenger4=mysqli_real_escape_string($dbConn,$_POST['emailofpassenger4']);
         $ageofpassenger4=mysqli_real_escape_string($dbConn,$_POST['ageofpassenger4']);
         $adhaarofpassenger4=mysqli_real_escape_string($dbConn,$_POST['adhaarofpassenger4']);
         $mobileofpassenger4=mysqli_real_escape_string($dbConn,$_POST['mobileofpassenger4']);
 mysqli_query($dbConn,"INSERT INTO bookingp_customers(booking_cid,name,email,age,adhaar_id,mobile,status) VALUES($booking_cid,'$nameofpassenger4','$emailofpassenger4','$ageofpassenger4','$adhaarofpassenger4','$mobileofpassenger4','booked')");
     }
   
   
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Travel and Tour</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>
</head>
<body>

<div id="wrapper_outter">
  <div id="wrapper_inner">
    <div id="wrapper">
      <div id="container">
        <div id="header">
          <div id="header_left">
            <div id="menu">
              <ul>
                <li><a href="afterloginhome.php" class="current"><span></span>Home</a></li>
                <li><a href="mytourbookings.php">MyTour Bookings</a></li>
                <li><a href="afterloginhotels.html">Hotels</a></li>
                <li><a href="myhotelbooking.php">Hotels</a></li>
                
                <li></li>
                
              </ul>
            </div>
            <!-- end of menu -->
            <div id="site_title">
              <h1>&nbsp;</h1>
            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          </div>
          <!-- end of header left -->
          <div id="header_right">
             <form action="sessionend.php" method="post">
                          <button type="submit" name="signout">Signout</button>
                          
                  </form>
            
              </button>
            </form>
          </div>
          <!-- end of header right -->
          <div class="float_l"></div>
        </div>
        <!-- end of header -->
       
          
          <div id="content_outer">
            <div id="content">
              <div class="content_section"><br />
                  <h2> Your Booking is Confirmed </h2>
              
</div>
              <div class="content_section">
                <div class="content_section">
                    <h3>Book hotels in your Destination </h3>
                        <form action="afterloginhotels.html">
                            <button type="submit"> Click Here </button>
                    </form>
                    <h3>Check Your Booking</h3>
                        <form action="mytourbookings.php">
                            <button type="submit" >Go To MyTour Bookings</button>
                    </form>
                    
                  
                <blockquote>
                  <blockquote>
                    <blockquote>
                        <blockquote>
                          <blockquote>&nbsp;</blockquote>
                        </blockquote>
                      </blockquote>
                    </blockquote>
                  </blockquote>
                  <div class="cleaner">
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                  </div>
                  <div class="button_01"></div>
                <div class="cleaner"></div></div>
                <p>&nbsp;</p>
              </div>
              <div class="content_section">
                <div class="content_section">
                  <p>&nbsp;</p>
                  <blockquote>
                    <blockquote>
                      <blockquote>
                        <blockquote>
                          <blockquote>&nbsp;                          </blockquote>
                        </blockquote>
                      </blockquote>
                    </blockquote>
                  </blockquote>
                  <div class="cleaner"></div>
                  <div class="button_01"></div>
                  <div class="cleaner"></div>
                </div>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
              </div>
              <p>&nbsp;</p>
            </div>
            <!-- end of content -->
            <div id="content_bottom"></div>
            <div class="cleaner"></div>
          </div>
          <!-- end of content_outer -->
          <div id="template_sidebar">
            <div class="sidebar_section">
              <h2>New Destinations</h2>
              <div class="image_wrapper"> <a href="#"><img src="images/image_01.jpg" alt="" width="260" height="120" /></a> </div>
              <h3>Lorem ipsum dolor sit amet</h3>
              <p>Sed et quam vitae ipsum vulputate varius vitae semper nunc. Quisque eget elit quis augue pharetra feugiat. </p>
              <div class="button_01"><a href="#">Read more</a></div>
              <div class="cleaner_h30"></div>
              <div class="image_wrapper"> <a href="#"><img src="images/image_02.jpg" alt="" width="260" height="120" /></a> </div>
              <h3>Maecenas scelerisque porttitor</h3>
              <p>Donec augue sem, interdum sed elementum a, feugiat id ligula. Sed id blandit dolor. Curabitur nibh ligula. </p>
              <div class="button_01"><a href="#">Read more</a></div>
            </div>
          </div>
          <!-- end of template_sidebar -->
          <div class="cleaner"></div>
        </div>
        <!-- end of content_wrapper -->
        <div id="footer">
          <ul class="footer_menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Tours</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Gallery</a></li>
            <li class="last_menu"><a href="#">Contact</a></li>
          </ul>
          Copyright &copy; 2048 <a href="#">Your Company Name</a> | Designed by <a target="_blank" rel="nofollow" href="http://www.templatemo.com">templatemo</a></div>
        <!-- end of footer -->
        <div class="cleaner"></div>
      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
  </div>
</div>
</body>
</html>
