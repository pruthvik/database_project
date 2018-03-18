<?php

$dbUser="root";
$dbPass="";
$dbDatabase="test1";
$dbHost="localhost";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);
if(isset($_POST['submitlocation']))
{
    $hotellocation= mysqli_real_escape_string($dbConn,$_POST['hotellocation']);
    $hotelcategory=mysqli_real_escape_string($dbConn,$_POST['hotelcategory']);
     $checkindate=$_POST['checkindate'];
    $checkoutdate=$_POST['checkoutdate'];
    if($hotelcategory=='all')
    {  
     $query=mysqli_query($dbConn,"SELECT * FROM hotels WHERE hotel_location='$hotellocation'");
    }
 else {
     $query=mysqli_query($dbConn,"SELECT * FROM hotels WHERE hotel_location='$hotellocation' && hotel_category='$hotelcategory'");   
    }
  
        
    
}
    if(mysqli_num_rows($query)<1)
    {
        header("Location: ./hotels.html");
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
          </div>
          <!-- end of header right -->
          <div class="float_l"></div>
        </div>
        <!-- end of header -->
       
          
          <div id="content_outer">
            <div id="content">
              <div class="content_section">
                  <h1>Hotels in <?php echo $hotellocation; ?> </h1>
              
              
</div>
              <div class="content_section">
                <div class="content_section">
               <?php
               while($row= mysqli_fetch_assoc($query))
{
    print("<h2>"."Hotel name:".$row['hotel_name']."</h2>");
    print("<h2>"."Hotel Location:".$row['hotel_location']."</h2>");
    
    print("<h2>"."Hotel Address:".$row['hotel_address']."</h2>");
    print("<h2>"."Hotel Category:".$row['hotel_category']."</h2>");
          $hotel_id=$row['hotel_id'];
          $roomsquery=mysqli_query($dbConn,"SELECT * FROM bookinghotel_available WHERE hotel_id=$hotel_id ");
          while($row1=mysqli_fetch_assoc($roomsquery))
          {
              if($row1['people_per_room']==1)
              print("<h2>"."Single Bedrooms available:".$row1['rooms_available']."  "."Price:".$row1['costper_room']."</h2>");
              if($row1['people_per_room']==2)
              print("<h2>"."Double Bedrooms available:".$row1['rooms_available']."  "."Price:".$row1['costper_room']."</h2>");
              if($row1['people_per_room']==3)
              print("<h2>"."Triple Bedrooms available:".$row1['rooms_available']."  "."Price:".$row1['costper_room']."</h2>");
              
          }   
    echo '<form method="post" action="checksessionhotels.php">
        <input type="hidden" name="hotel_id" value="'.$hotel_id.'">
            <input type="hidden" name="checkindate" value="'.$checkindate.'">
                <input type="hidden" name="checkoutdate" value="'.$checkoutdate.'">
                    
            
             <h3>Number of Rooms:
           <select name="numberofrooms">
             <option selectted value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             
             </select></h3>
             <h3>Room type:
             <select name="roomtype">
             <option selectted value="1">Single</option>
             <option value="2">Double</option>
             <option value="3">Triple</option>
             </select>
             <br>
             <h1> </h1>
            <button type="submit" name="submitbook">Book</button>
             </form>' ;
            
    
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

    
 
