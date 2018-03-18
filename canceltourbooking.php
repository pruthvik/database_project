<?php


$dbUser="root";
$dbPass="";
$dbDatabase="test1";
$dbHost="localhost";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);
$booking_packages_id=$_POST['booking_packages_id'];
$seats_id=$_POST['seats_id'];
$package_id=$_POST['package_id'];
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
                <li><a href="mytourbookings.html">MyTour Bookings</a></li>
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
              <div class="content_section"><br />
                  <h1>Confirm Cancel </h1>
              
</div>
              <div class="content_section">
                <div class="content_section">
                <?php
                 $booking_packagesquery=mysqli_query($dbConn,"SELECT * FROM booking_packages WHERE booking_packages_id=$booking_packages_id && (status='booked' || status='halfcancelled')");
                 $seats_query=mysqli_query($dbConn,"SELECT * FROM seats_available WHERE seats_id=$seats_id");
                 $package_query=mysqli_query($dbConn,"SELECT * FROM packages WHERE package_id=$package_id");
                 $customers=mysqli_query($dbConn,"SELECT * FROM bookingp_customers WHERE booking_cid=$booking_packages_id && status='booked'");
                 while($row=mysqli_fetch_assoc($seats_query))
                 {
                      print("<h3>"."From Location:".$row['seats_fromlocation']."</h3>");
                      print("<h3>"."To Location:".$row['seats_tolocation']."</h3>");
                      print("<h3>"."Type Of Transport".$row['seats_typeoftransport']."</h3>");
                      print("<h3>"."Pick up Point From Location".$row['seats_startlocation']."</h3>");
                      print("<h3>"."Departure Start Date:".$row['seats_startdate']);
                      print("<h3>"."Departure Start Time:".$row['seats_starttime']."</h3>");
                      print("<h3>"."Pick up Point End Location".$row['seats_endlocation']."</h3>");
                      print("<h3>"."Departure End Date:".$row['seats_enddate']);
                      print("<h3>"."Departure End Time:".$row['seats_endtime']);
                      print("<h3>"."Journey Time:".$row['seats_journeytime']);
                 }
                 while($row=mysqli_fetch_assoc($package_query))
                 {
                     print("<h3>"."Days Of Tour:".$row['package_numberofdays']);
                     print("<h3>"."Cost Per Person:".$row['package_amount']);
                 }
                 while($row1=mysqli_fetch_assoc($booking_packagesquery))
                 {
                     $numberofpeople=$row1['booking_numberofpeople'];
                 }
                 $y=1;
                  echo ' <form method="post" action="aftercanceltour.php">';
                  while($row2=mysqli_fetch_assoc($customers))
                {
                         if($y==1)
                         {
                   
                                 echo'   <h4>Name:<input type="text" value="'.$row2['name'].'" readonly="readonly"  size="10">
                                      E-mail:<input type="text" value="'.$row2['email'].'" readonly="readonly"  size="15">
                                       Age:<input type="text" value="'.$row2['age'].'" readonly="readonly" size="2" ></h4>
                                       <h4>Mobile:<input type="text" value="'.$row2['mobile'].'" readonly="readonly" size="10" >
                                       Adhaar ID:<input type="text" value="'.$row2['adhaar_id'].'" readonly="readonly" size="10" >
                                           Cancel:<input type="checkbox" name="cancel1" value="'.$row2['booking_p_cid'].'"></h4>';
                         }
                         
                         if($y==2)
                         {
                              echo'   <h4>Name:<input type="text" value="'.$row2['name'].'" readonly="readonly"  size="10">
                                      E-mail:<input type="text" value="'.$row2['email'].'" readonly="readonly"  size="15">
                                       Age:<input type="text" value="'.$row2['age'].'" readonly="readonly" size="2" ></h4>
                                       <h4>Mobile:<input type="text" value="'.$row2['mobile'].'" readonly="readonly" size="10" >
                                       Adhaar ID:<input type="text" value="'.$row2['adhaar_id'].'" readonly="readonly" size="10" >
                                           Cancel:<input type="checkbox" name="cancel2" value="'.$row2['booking_p_cid'].'"></h4>';
                         }
                         
                         if($y==3)
                         {
                              echo'   <h4>Name:<input type="text" value="'.$row2['name'].'" readonly="readonly"  size="10">
                                      E-mail:<input type="text" value="'.$row2['email'].'" readonly="readonly"  size="15">
                                       Age:<input type="text" value="'.$row2['age'].'" readonly="readonly" size="2" ></h4>
                                       <h4>Mobile:<input type="text" value="'.$row2['mobile'].'" readonly="readonly" size="10" >
                                       Adhaar ID:<input type="text" value="'.$row2['adhaar_id'].'" readonly="readonly" size="10" >
                                           Cancel:<input type="checkbox" name="cancel3" value="'.$row2['booking_p_cid'].'"></h4>';
                         }
                         if($y==4)
                         {
                              echo'   <h4>Name:<input type="text" value="'.$row2['name'].'" readonly="readonly"  size="10">
                                      E-mail:<input type="text" value="'.$row2['email'].'" readonly="readonly"  size="15">
                                       Age:<input type="text" value="'.$row2['age'].'" readonly="readonly" size="2" ></h4>
                                       <h4>Mobile:<input type="text" value="'.$row2['mobile'].'" readonly="readonly" size="10" >
                                       Adhaar ID:<input type="text" value="'.$row2['adhaar_id'].'" readonly="readonly" size="10" >
                                           Cancel:<input type="checkbox" name="cancel4" value="'.$row2['booking_p_cid'].'"></h4>';
                         }
                         $y=$y+1;
                             
                }
                echo'
                   <input type="hidden" name="booking_packages_id" value="'.$booking_packages_id.'">
                       <input type="hidden" name="seats_id" value="'.$seats_id.'">
                           <input type="hidden" name="numberofpeople" value="'.$numberofpeople.'">
                   <button type="submit" name="cancelhotelbooking">Confirm Cancel</button>
                   </form>';
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



