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
    
    $packagedetailsquery="SELECT * FROM booking_packages AS bp,packages AS p,seats_available AS s WHERE bp.user_id=$user_id && bp.bookingp_id=p.package_id && bp.booking_seats_id=s.seats_id && (bp.status='halfcancelled' || bp.status='cancelled')";
    $packagedetails=mysqli_query($dbConn,$packagedetailsquery);
        
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
          </div>
          <!-- end of header right -->
          <div class="float_l"></div>
        </div>
        <!-- end of header -->
       
          
          <div id="content_outer">
            <div id="content">
                
              <div class="content_section">
                   <h1>Cancelled Tickets  </h1>
                     
                      
                  
                 
                  
              
</div>
              <div class="content_section">
                <div class="content_section">
                <?php 
                      if(mysqli_num_rows($packagedetails)==0)
                {
                    print("<h1>"."No Cancellations Done Yet"."</h1>");
                }
               
                  while($row=mysqli_fetch_assoc($packagedetails))
                  {
                      print("<h3>"."Booking Date:".$row['booking_packages_bdate']."</h3>");
                      print("<h3>"."From Location:".$row['package_fromlocation']."</h3>");
                      print("<h3>"."To Location:".$row['package_tolocation']."</h3>");
                      print("<h3>"."Type Of Transport".$row['package_typeoftransport']."</h3>");
                      print("<h3>"."Pick up Point From Location".$row['seats_startlocation']."</h3>");
                      print("<h3>"."Departure Start Date:".$row['seats_startdate']);
                      print("<h3>"."Departure Start Time:".$row['seats_starttime']."</h3>");
                      print("<h3>"."Pick up Point End Location".$row['seats_endlocation']."</h3>");
                      print("<h3>"."Departure End Date:".$row['seats_enddate']);
                      print("Departure End Time:".$row['seats_endtime']."</h3>");
                      print("<h3>"."Journey Time:".$row['seats_journeytime']);
                      print("<h3>"."Days of Tour".$row['package_numberofdays']);
                      $seats_id=$row['seats_id'];
                      $booking_cid=$row['booking_packages_id'];
                      $package_id=$row['package_id'];
                      $customersquery=mysqli_query($dbConn,"SELECT * FROM bookingp_customers WHERE booking_cid=$booking_cid && status='cancelled'");
                      while($row1=mysqli_fetch_assoc($customersquery))
                      {
                          print("<h3> Person Details:</h3>");
                           echo ' <form>
                                    <h4>Name:<input type="text" value="'.$row1['name'].'" readonly="readonly"  size="10">
                                      E-mail:<input type="text" value="'.$row1['email'].'" readonly="readonly"  size="15">
                                       Age:<input type="text" value="'.$row1['age'].'" readonly="readonly" size="2" ></h4>
                                       <h4>Mobile:<input type="text" value="'.$row1['mobile'].'" readonly="readonly" size="10" >
                                       Adhaar ID:<input type="text" value="'.$row1['adhaar_id'].'" readonly="readonly" size="10" >
                                           Status:<input type="text" value="'.$row1['status'].'" readonly="readonly" size="8"></h4>
                                       </form>';
                      }
                      
                           
                      
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


