<?php


$dbUser="root";
$dbPass="";
$dbDatabase="test1";
$dbHost="localhost";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);
session_start();
 $sessionid=session_id();
    $user_idquery=mysqli_query($dbConn,"SELECT active_user_id FROM activeusers WHERE session_id='$sessionid'");
    while($row=mysqli_fetch_assoc($user_idquery))
    {
        $user_id=$row['active_user_id'];
    }
    
    $bookinghotelsquery=mysqli_query($dbConn,"SELECT * FROM booking_hotels WHERE user_id =$user_id && (status='booked' || status='halfcancelled')" );
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
                
                <li><a href="myhotelbookings.php">MyHotel Bookings</a></li>
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
                  <h1>My Bookings</h1>
                  <form action="viewcancelledhotelbooking.php">
                        <button type="submit" >View Cancelled Bookings</button>
                  </form>
              
</div>
              <div class="content_section">
                <div class="content_section">
                    <?php
                      $x=1;
                      if(mysqli_num_rows($bookinghotelsquery)==0)
                      {
                          print("<h1>No Bookings Done Yet </h1>");
                      }
                      while($row=mysqli_fetch_assoc($bookinghotelsquery))
                      {
                            print("<h3>"."Booking Date:".$row['booking_date']);
                            $hotel_idquery=$row['hotel_id'];
                            $hotelnamequery=mysqli_query($dbConn,"SELECT * FROM hotels WHERE hotel_id=$hotel_idquery");
                            while($row1=mysqli_fetch_assoc($hotelnamequery))
                            {
                                print("<h3>"."Hotel Name:".$row1['hotel_name']."</h3>");
                                print("<h3>"."Hotel Address:".$row1['hotel_address']."</h3>");
                                print("<h3>"."Hotel Category:".$row1['hotel_category']."</h3>");
                                print("<h3>"."Hotel Location".$row1['hotel_location']."</h3>");
                            }
                            print("<h3>"."Checkin Date:".$row['checkindate']."</h3>");
                            print("<h3>"."Checkout Date:".$row['checkoutdate']."</h3>");
                            print("<h3>"."Number of Rooms:".$row['numberofrooms']."</h3>");
                            if($row['room_type']==1)
                                print("<h3>Room Type: Single</h3>");
                            if($row['room_type']==2)
                                print("<h3>Room Type: Double</h3>");
                            if($row['room_type']==3)
                                print("<h3>Room Type: Triple</h3>");
                            $hotel_available_id=$row['bookingh_available_id'];
                            $availablequery=mysqli_query($dbConn,"SELECT * FROM bookinghotel_available WHERE hotel_available_id=$hotel_available_id");
                            while($row2=mysqli_fetch_assoc($availablequery))
                            {
                                print("<h3>"."Cost per Room:".$row2['costper_room']."</h3>");
                                print("<h3>"."Total Cost:".$row2['costper_room']*$row['numberofrooms']."</h3>");
                            }
                            
                            $booking_hotels_id=$row['booking_hotels_id'];
                           
                            $booking_hotels_idquery=mysqli_query($dbConn,"SELECT * FROM bookinghotel_customers WHERE booking_hotel_id=$booking_hotels_id && status='booked'");
                            while($row3=mysqli_fetch_assoc($booking_hotels_idquery))
                            {
                               echo ' <form>
                                    <h4>Name:<input type="text" value="'.$row3['name'].'" readonly="readonly"  size="10">
                                      E-mail:<input type="text" value="'.$row3['email'].'" readonly="readonly"  size="15">
                                       Age:<input type="text" value="'.$row3['age'].'" readonly="readonly" size="2" ></h4>
                                       <h4>Mobile:<input type="text" value="'.$row3['mobile'].'" readonly="readonly" size="10" >
                                       Adhaar ID:<input type="text" value="'.$row3['adhaarid'].'" readonly="readonly" size="10" ></h4>
                                       </form>';
                                       
                                
                                
                            }
                            
                            echo '<form method="post" action="cancelhotelbooking.php">
                                    <input type="hidden" name="hotel_id" value="'.$hotel_idquery.'" >
                                    <input type="hidden" name="hotel_available_id" value="'.$hotel_available_id.'">
                                    <input type="hidden" name="booking_hotels_id" value="'.$booking_hotels_id.'">
                                     <button type="submit" name="cancelhotelsubmit">Cancel Booking</button>
                                    <form>';      
                            
                      }
                      ?>
               
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



