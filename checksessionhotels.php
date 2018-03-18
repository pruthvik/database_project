<?php

session_start();
$dbUser="root";
$dbPass="";
$dbDatabase="test1";
$dbHost="localhost";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);

if(isset($_SESSION['email']))
{
  $hotel_id=$_POST['hotel_id'];
  $checkindate=$_POST['checkindate'];
  $checkoutdate=$_POST['checkoutdate'];
  $numberofrooms=$_POST['numberofrooms'];
  $roomtype=(int)$_POST['roomtype'];
   $hotelsquery=mysqli_query($dbConn,"SELECT * FROM hotels WHERE hotel_id=$hotel_id ");
   $hotels_availableid_query=mysqli_query($dbConn,"SELECT * FROM bookinghotel_available WHERE hotel_id=$hotel_id && checkindate='$checkindate' && people_per_room=$roomtype ");
    
    while($row=mysqli_fetch_assoc($hotels_availableid_query))
    {
        
        $bookingh_available_id=$row['hotel_available_id'];
    }
    
     $sessionid=session_id();
    $user_idquery=mysqli_query($dbConn,"SELECT active_user_id FROM activeusers WHERE session_id='$sessionid'");
    while($row=mysqli_fetch_assoc($user_idquery))
    {
        $user_id=$row['active_user_id'];
    }
 
}
else
{
    header("Location: ./registerfirstindex.html");
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
                <li><a href="afterhotels.html">Hotels</a></li>
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
               <h1>Confirm Hotel Booking </h1>
              
</div>
              <div class="content_section">
                <div class="content_section">
                    <?php
                      
                      while($row=mysqli_fetch_assoc($hotelsquery))
                      {
                          print("<h2>"."Hotel Name:".$row['hotel_name']."</h2>");
                          print("<h2>"."Hotel Location:".$row['hotel_location']."</h2>");
                          print("<h2>"."Hotel Category:".$row['hotel_category']."</h2>");
                          print("<h2>"."Hotel Address:".$row['hotel_address']."</h2");
                          
                      }
                      print("<br>");
                       print("<h2>"."Checkin Date:".$checkindate."      "."Checkout Date:".$checkoutdate."</h2>");
                       print("<h2>"."Number of rooms:".$numberofrooms."</h2>");
                       if($roomtype==1)
                       {  print("<h2>"."Room Type: Single"."</h2>"); }
                       if($roomtype==2)
                       {   print("<h2>"."Room Type: Double"."</h2>"); }
                       if($roomtype==3)
                       {    print("<h2>">"Room Type: Triple"."</h2>");}
                      
                       ?>
                    
                    
                    <?php
                       if($numberofrooms==1)
                       {
                             
                           echo' <form method="post" action="afterbookinghotels.php">
                               
                                   <input type="hidden" name="hotel_id" value="'.$hotel_id.'">
                                       <input type="hidden" name="bookingh_available_id" value="'.$bookingh_available_id.'">
                                           <input type="hidden" name="checkindate" value="'.$checkindate.'">
                                               <input type="hidden" name="checkoutdate" value="'.$checkoutdate.'">
                                                <input type="hidden" name="numberofrooms" value="'.$numberofrooms.'">   
                                                    <input type="hidden" name="user_id" value="'.$user_id.'">
                                                        <input type="hidden" name="roomtype" value="'.$roomtype.'">
                                  <h2> Enter the Primary Person Details:</h2>
                                    <h3> Name: <input type="text" name="name1"  >
                                         E-mail:<input type="email" name="email1">
                                         Age: <input type="text" name="age1" size="2"><br></br>
                                         Mobile number: <input type="text" name="mobilenumber1" size="12">
                                         Adhaar ID: <input type="text" name="adhaarid1" size="15"></h3>
                                         <br>
                                          <h1>  </h1>
                                         <button type="sumbit" name="confirmhotelbooking">Confirm</button>
                                   </form>';
                           
                       }
                       
                       if($numberofrooms==2)
                       {
                            echo' <form method="post" action="afterbookinghotels.php">
                                     <input type="hidden" name="hotel_id" value="'.$hotel_id.'">
                                       <input type="hidden" name="bookingh_available_id" value="'.$bookingh_available_id.'">
                                           <input type="hidden" name="checkindate" value="'.$checkindate.'">
                                               <input type="hidden" name="checkoutdate" value="'.$checkoutdate.'">
                                                <input type="hidden" name="numberofrooms" value="'.$numberofrooms.'">   
                                                    <input type="hidden" name="user_id" value="'.$user_id.'">
                                                        <input type="hidden" name="roomtype" value="'.$roomtype.'">
                                 <h2> Enter the Primary Person Details:</h2>
                                    <h3> Name: <input type="text" name="name1" >
                                         E-mail:<input type="email" name="email1">
                                         Age: <input type="text" name="age1" size="2"><br></br>
                                         Mobile number: <input type="text" name="mobilenumber1" size="12">
                                         Adhaar ID: <input type="text" name="adhaarid1" size="15"></h3>
                                  <h2> Enter the Primary Person Details:</h2>
                                  
                                    <h3> Name: <input type="text" name="name2" >
                                         E-mail:<input type="email" name="email2">
                                         Age: <input type="text" name="age2" size="2"><br></br>
                                         Mobile number: <input type="text" name="mobilenumber2" size="12">
                                         Adhaar ID: <input type="text" name="adhaarid2" size="15"></h3>
                                         
                                         <br>
                                          <h1>  </h1>
                                         <button type="sumbit" name="confirmhotelbooking">Confirm</button>
                                   </form>';
                       }
                       
                         if($numberofrooms==3)
                       {
                            echo' <form method="post" action="afterbookinghotels.php">
                                     <input type="hidden" name="hotel_id" value="'.$hotel_id.'">
                                       <input type="hidden" name="bookingh_available_id" value="'.$bookingh_available_id.'">
                                           <input type="hidden" name="checkindate" value="'.$checkindate.'">
                                               <input type="hidden" name="checkoutdate" value="'.$checkoutdate.'">
                                                <input type="hidden" name="numberofrooms" value="'.$numberofrooms.'">   
                                                    <input type="hidden" name="user_id" value="'.$user_id.'">
                                                        <input type="hidden" name="roomtype" value="'.$roomtype.'">
                                 <h2> Enter the Primary Person Details:</h2>
                                    <h3> Name: <input type="text" name="name1" >
                                         E-mail:<input type="email" name="email1">
                                         Age: <input type="text" name="age1" size="2"><br></br>
                                         Mobile number: <input type="text" name="mobilenumber1" size="10">
                                         Adhaar ID: <input type="text" name="adhaarid1" size="15"></h3>
                                           <h2> Enter the Primary Person Details:</h2>
                                  
                                    <h3> Name: <input type="text" name="name2" >
                                         E-mail:<input type="email" name="email2">
                                         Age: <input type="text" name="age2" size="2"><br></br>
                                         Mobile number: <input type="text" name="mobilenumber2" size="12">
                                         Adhaar ID: <input type="text" name="adhaarid2" size="15"></h3>
                                  <h2> Enter the Primary Person Details:</h2>
                                    <h3> Name: <input type="text" name="name3" >
                                         E-mail:<input type="email" name="email3">
                                         Age: <input type="text" name="age3" size="2"><br></br>
                                         Mobile number: <input type="text" name="mobilenumber3" size="12">
                                         Adhaar ID: <input type="text" name="adhaarid3" size="15"></h3>
                                         <br>
                                          <h1>  </h1>
                                         <button type="sumbit" name="confirmhotelbooking">Confirm</button>
                                   </form>';
                       }
                       
                         if($numberofrooms==4)
                       {
                            echo' <form method="post" action="afterbookinghotels.php">
                                     <input type="hidden" name="hotel_id" value="'.$hotel_id.'">
                                       <input type="hidden" name="bookingh_available_id" value="'.$bookingh_available_id.'">
                                           <input type="hidden" name="checkindate" value="'.$checkindate.'">
                                               <input type="hidden" name="checkoutdate" value="'.$checkoutdate.'">
                                                <input type="hidden" name="numberofrooms" value="'.$numberofrooms.'">   
                                                    <input type="hidden" name="user_id" value="'.$user_id.'">
                                                        <input type="hidden" name="roomtype" value="'.$roomtype.'">
                                 <h2> Enter the Primary Person Details:</h2>
                                    <h3> Name: <input type="text" name="name1" >
                                         E-mail:<input type="email" name="email1">
                                         Age: <input type="text" name="age1" size="2"><br></br>
                                         Mobile number: <input type="text" name="mobilenumber1" size="12">
                                         Adhaar ID: <input type="text" name="adhaarid1" size="15"></h3>
                                  <h2> Enter the Primary Person Details:</h2>
                                  <h2> Enter the Primary Person Details:</h2>
                                  
                                    <h3> Name: <input type="text" name="name2" >
                                         E-mail:<input type="email" name="email2">
                                         Age: <input type="text" name="age2" size="2"><br></br>
                                         Mobile number: <input type="text" name="mobilenumber2" size="12">
                                         Adhaar ID: <input type="text" name="adhaarid2" size="15"></h3>
                                           <h2> Enter the Primary Person Details:</h2>
                                    <h3> Name: <input type="text" name="name3" >
                                         E-mail:<input type="email" name="email3">
                                         Age: <input type="text" name="age3" age="2"><br></br>
                                         Mobile number: <input type="text" name="mobilenumber3" size="12">
                                         Adhaar ID: <input type="text" name="adhaarid3" age="15"></h3>
                                         
                                  <h2> Enter the Primary Person Details:</h2>
                                    <h3> Name: <input type="text" name="name4" >
                                         E-mail:<input type="email" name="email4">
                                         Age: <input type="text" name="age4" size="2"><br></br>
                                         Mobile number: <input type="text" name="mobilenumber4" size="12">
                                         Adhaar ID: <input type="text" name="adhaarid4"  size="15"></h3>
                                         <br>
                                          <h1>  </h1>
                                         <button type="sumbit" name="confirmhotelbooking">Confirm</button>
                                   </form>';
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







