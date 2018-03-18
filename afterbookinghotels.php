<?php

$dbUser="root";
$dbPass="";
$dbDatabase="test1";
$dbHost="localhost";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);
if(isset($_POST['confirmhotelbooking']))
{
    $user_id=$_POST['user_id'];
    $hotel_id=$_POST['hotel_id'];
    $bookingh_available_id=$_POST['bookingh_available_id'];
    $checkindate=$_POST['checkindate'];
    $checkoutdate=$_POST['checkoutdate'];
    $numberofrooms=$_POST['numberofrooms'];
    $roomtype=$_POST['roomtype'];
    mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available-$numberofrooms WHERE hotel_id=$hotel_id && checkindate='$checkindate' people_per_room=$roomtype");
     
     $today=date('Y-m-d H:i:s');
     mysqli_query($dbConn,"INSERT INTO booking_hotels(user_id,hotel_id,bookingh_available_id,checkindate,checkoutdate,numberofrooms,booking_date,room_type,status) VALUES($user_id,$hotel_id,$bookingh_available_id,'$checkindate','$checkoutdate',$numberofrooms,'$today','$roomtype','booked')");
    $booking_hotels_idquery=mysqli_query($dbConn,"SELECT * FROM booking_hotels WHERE booking_date='$today' ");
     while($row=mysqli_fetch_assoc($booking_hotels_idquery))
     {
         $booking_hotels_id=$row['booking_hotels_id'];
     }
     if($numberofrooms>=1)
     {
          $nameofpassenger=mysqli_real_escape_string($dbConn,$_POST['name1']);
         $emailofpassenger=mysqli_real_escape_string($dbConn,$_POST['email1']);
         $ageofpassenger=mysqli_real_escape_string($dbConn,$_POST['age1']);
         $adhaarofpassenger=mysqli_real_escape_string($dbConn,$_POST['adhaarid1']);
         $mobileofpassenger=mysqli_real_escape_string($dbConn,$_POST['mobilenumber1']);
         mysqli_query($dbConn,"INSERT INTO bookinghotel_customers(booking_hotel_id,name,email,age,mobile,adhaarid,status) VALUES ($booking_hotels_id,'$nameofpassenger','$emailofpassenger',$ageofpassenger,'$mobileofpassenger','$adhaarofpassenger','booked')");
         
         
     }
     
     if($numberofrooms>=2)
     {
         $nameofpassenger=mysqli_real_escape_string($dbConn,$_POST['name2']);
         $emailofpassenger=mysqli_real_escape_string($dbConn,$_POST['email2']);
         $ageofpassenger=mysqli_real_escape_string($dbConn,$_POST['age2']);
         $adhaarofpassenger=mysqli_real_escape_string($dbConn,$_POST['adhaarid2']);
         $mobileofpassenger=mysqli_real_escape_string($dbConn,$_POST['mobilenumber2']);
         mysqli_query($dbConn,"INSERT INTO bookinghotel_customers(booking_hotel_id,name,email,age,mobile,adhaarid,status) VALUES ($booking_hotels_id,'$nameofpassenger','$emailofpassenger',$ageofpassenger,'$mobileofpassenger','$adhaarofpassenger','booked')");
     }
     
     if($numberofrooms>=3)
     {
         $nameofpassenger=mysqli_real_escape_string($dbConn,$_POST['name3']);
         $emailofpassenger=mysqli_real_escape_string($dbConn,$_POST['email3']);
         $ageofpassenger=mysqli_real_escape_string($dbConn,$_POST['age3']);
         $adhaarofpassenger=mysqli_real_escape_string($dbConn,$_POST['adhaarid3']);
         $mobileofpassenger=mysqli_real_escape_string($dbConn,$_POST['mobilenumber3']);
         mysqli_query($dbConn,"INSERT INTO bookinghotel_customers(booking_hotel_id,name,email,age,mobile,adhaarid,status) VALUES ($booking_hotels_id,'$nameofpassenger','$emailofpassenger',$ageofpassenger,'$mobileofpassenger','$adhaarofpassenger','booked')");
     }
    if($numberofrooms>=4)
    {
        $nameofpassenger=mysqli_real_escape_string($dbConn,$_POST['name4']);
         $emailofpassenger=mysqli_real_escape_string($dbConn,$_POST['email4']);
         $ageofpassenger=mysqli_real_escape_string($dbConn,$_POST['age4']);
         $adhaarofpassenger=mysqli_real_escape_string($dbConn,$_POST['adhaarid4']);
         $mobileofpassenger=mysqli_real_escape_string($dbConn,$_POST['mobilenumber4']);
         mysqli_query($dbConn,"INSERT INTO bookinghotel_customers(booking_hotel_id,name,email,age,mobile,adhaarid,status) VALUES ($booking_hotels_id,'$nameofpassenger','$emailofpassenger',$ageofpassenger,'$mobileofpassenger','$adhaarofpassenger','booked')");
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
                <li><a href="myhotelbooking.php">MyHotel Bookings</a></li>
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
                  <h1>Your Booking is Confirmed</h1>
              
</div>
              <div class="content_section">
                <div class="content_section">
                    <h2>Go To My Booking ?</h2>
                        <form action="myhotelbooking.php">
                            <button type="submit" name="submitmyhotelbooking"> Click Here</button>
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



