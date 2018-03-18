<?php

$dbUser="root";
$dbPass="";
$dbDatabase="test1";
$dbHost="localhost";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);
$booking_hotels_id=$_POST['booking_hotels_id'];
$hotel_available_id=$_POST['hotel_available_id'];
$numberofrooms=$_POST['numberofrooms'];
if($numberofrooms==1)
{
    if(isset($_POST['cancel1']))
    {
        mysqli_query($dbConn,"UPDATE booking_hotels SET status='cancelled' WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+1 WHERE hotel_available_id=$hotel_available_id");
        $cancel1row=$_POST['cancel1'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancel1row");
    }
 else {
        header("Location: ./cancelhotelbooking.php");
    }
    
    
}
if($numberofrooms==2)
{
    if(isset($_POST['cancel1']) && !isset($_POST['cancel2']))
    {
         mysqli_query($dbConn,"UPDATE booking_hotels SET status='halfcancelled',numberofrooms=numberofrooms-1 WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+1 WHERE hotel_available_id=$hotel_available_id");
        $cancel1row=$_POST['cancel1'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancel1row");
    }
    
 
     
     if(isset($_POST['cancel2']) && !isset($_POST['cancel1']) )
    {
         mysqli_query($dbConn,"UPDATE booking_hotels SET status='halfcancelled',numberofrooms=numberofrooms-1 WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+1 WHERE hotel_available_id=$hotel_available_id ");
        $cancel1row=$_POST['cancel2'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancel1row");
    }
    if(isset($_POST['cancel1']) && isset($_POST['cancel2']))
    {
         mysqli_query($dbConn,"UPDATE booking_hotels SET status='cancelled' WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+2 WHERE hotel_available_id=$hotel_available_id ");
        $cancel1row=$_POST['cancel1'];
        $canel2row=$_POST['cancel2'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancel1row");
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancel2row");
    }
    
        
    
    
    
        
    }
    
    if($numberofrooms==3)
    {
        if(isset($_POST['cancel1'])&& !isset($_POST['cancel2']) && !isset($_POST['cancel3']))
        {
         mysqli_query($dbConn,"UPDATE booking_hotels SET status='halfcancelled',numberofrooms=numberofrooms-1 WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+1 WHERE hotel_available_id=$hotel_available_id");
        $cancelrow=$_POST['cancel1'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancelrow");
        }
         if(!isset($_POST['cancel1']) && isset($_POST['cancel2']) && !isset($_POST['cancel3']))
        {
         mysqli_query($dbConn,"UPDATE booking_hotels SET status='halfcancelled',numberofrooms=numberofrooms-1 WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+1 WHERE hotel_available_id=$hotel_available_id");
        $cancelrow=$_POST['cancel2'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancelrow");
        }
         if(!isset($_POST['cancel1'])&& !isset($_POST['cancel2']) && isset($_POST['cancel3']))
        {
         mysqli_query($dbConn,"UPDATE booking_hotels SET status='halfcancelled',numberofrooms=numberofrooms-1 WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+1 WHERE hotel_available_id=$hotel_available_id");
        $cancelrow=$_POST['cancel3'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancelrow");
        }
          if(isset($_POST['cancel1'])&& isset($_POST['cancel2']) && !isset($_POST['cancel3']))
        {
         mysqli_query($dbConn,"UPDATE booking_hotels SET status='halfcancelled',numberofrooms=numberofrooms-1 WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+1 WHERE hotel_available_id=$hotel_available_id");
        $cancelrow=$_POST['cancel1'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancelrow");
             mysqli_query($dbConn,"UPDATE booking_hotels SET status='halfcancelled',numberofrooms=numberofrooms-1 WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+1 WHERE hotel_available_id=$hotel_available_id");
        $cancelrow=$_POST['cancel2'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancelrow");
        
        }
         if(isset($_POST['cancel1'])&& !isset($_POST['cancel2']) && isset($_POST['cancel3']))
        {
         mysqli_query($dbConn,"UPDATE booking_hotels SET status='halfcancelled',numberofrooms=numberofrooms-1 WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+1 WHERE hotel_available_id=$hotel_available_id");
        $cancelrow=$_POST['cancel1'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancelrow");
             mysqli_query($dbConn,"UPDATE booking_hotels SET status='halfcancelled',numberofrooms=numberofrooms-1 WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+1 WHERE hotel_available_id=$hotel_available_id");
        $cancelrow=$_POST['cancel3'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancelrow");
        
        }
         if(!isset($_POST['cancel1'])&& isset($_POST['cancel2']) && isset($_POST['cancel3']))
        {
         mysqli_query($dbConn,"UPDATE booking_hotels SET status='halfcancelled',numberofrooms=numberofrooms-1 WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+1 WHERE hotel_available_id=$hotel_available_id");
        $cancelrow=$_POST['cancel2'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancelrow");
             mysqli_query($dbConn,"UPDATE booking_hotels SET status='halfcancelled',numberofrooms=numberofrooms-1 WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+1 WHERE hotel_available_id=$hotel_available_id");
        $cancelrow=$_POST['cancel3'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancelrow");
        
        }
         if(isset($_POST['cancel1'])&& isset($_POST['cancel2']) && isset($_POST['cancel3']))
        {
         mysqli_query($dbConn,"UPDATE booking_hotels SET status='cancelled',numberofrooms=numberofrooms-3 WHERE booking_hotels_id=$booking_hotels_id");
        mysqli_query($dbConn,"UPDATE bookinghotel_available SET rooms_available=rooms_available+3 WHERE hotel_available_id=$hotel_available_id");
        $cancelrow=$_POST['cancel1'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancelrow");
          
        $cancelrow=$_POST['cancel2'];
        mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancelrow");
        $cancelrow=$_POST['cancel3'];
         mysqli_query($dbConn,"UPDATE bookinghotel_customers SET status='cancelled' WHERE bookinghotels_customers_id=$cancelrow");
        
        
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
          </div>
          <!-- end of header right -->
          <div class="float_l"></div>
        </div>
        <!-- end of header -->
       
          
          <div id="content_outer">
            <div id="content">
              <div class="content_section">
               <h1>Your Booking is Cancelled </h1>
              
</div>
              <div class="content_section">
                <div class="content_section">
               <?php
                $hotelbookingquery=mysqli_query($dbConn,"SELECT * FROM booking_hotels WHERE booking_hotels_id=$booking_hotels_id");
                 while($row=mysqli_fetch_assoc($hotelbookingquery))
                 {
                     $hotel_id=$row['hotel_id'];
                     $hotelsquery=mysqli_query($dbConn,"SELECT * FROM hotels WHERE hotel_id=$hotel_id");
                             while($row1=mysqli_fetch_assoc($hotelsquery))
                     {
                              print("<h3>"."Hotel Name:".$row1['hotel_name']."</h3>");
                    print("<h3>"."Hotel Category:".$row1['hotel_category']."</h3>");
                    print("<h3>"."Hotel Address".$row1['hotel_address']."</h3>");
                    print("<h3>"."Hotel Location".$row1['hotel_location']."</h3>");
                             }
                      print("<h3>"."CheckIn Date:".$row['checkindate']."</h3>");
                    print("<h3>"."CheckOut Date:".$row['checkoutdate']."</h3>");
                    
                 }
                  $hotel_customers_query=mysqli_query($dbConn,"SELECT * FROM bookinghotel_customers WHERE booking_hotel_id=$booking_hotels_id && status='cancelled' ");
                  while($row2=mysqli_fetch_assoc($hotel_customers_query))
                  {
                    echo '  <h4>Name:<input type="text" value="'.$row2['name'].'" readonly="readonly"  size="10">
                                      E-mail:<input type="text" value="'.$row2['email'].'" readonly="readonly"  size="15">
                                       Age:<input type="text" value="'.$row2['age'].'" readonly="readonly" size="2" ></h4>
                                       <h4>Mobile:<input type="text" value="'.$row2['mobile'].'" readonly="readonly" size="10" >
                                       Adhaar ID:<input type="text" value="'.$row2['adhaarid'].'" readonly="readonly" size="10" >
                                       Status:  <input type="text" value="'.$row2['status'].'"   readonly="readonly" size="10"></h4>';
                  }
                  ?>
                        <form action="myhotelbooking.php">
                            <button type="submit" >Back To Hotel Bookings</button>
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


