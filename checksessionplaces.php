<?php

session_start();
$dbUser="root";
$dbPass="";
$dbDatabase="test1";
$dbHost="localhost";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);

if(isset($_SESSION['email']))
{
    $fromlocation=$_POST['fromlocation'];
$tolocation=$_POST['tolocation'];
$journeydate=$_POST['journeydate'];
$typeoftransport=$_POST['typeoftransport'];
$costperperson=(int)$_POST['costperperson'];
$seatsremaining=(int)$_POST['seatsremaining'];
$numberofpeople=(int)$_POST['numberofpeople'];
$totalcost=$costperperson*$numberofpeople;
$seats_id=$_POST['seats_id'];


    
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
                  <h1> Confirm Booking</h1>
              
</div>
              <div class="content_section">
                <div class="content_section">
                    <h2>From Location: <?php echo $fromlocation ?> </h2>
                    <h2> To Location : <?php echo $tolocation ?></h2>
                    <h2> Date of journey: <?php echo $journeydate ?></h2>
                    <h2>Transport: <?php echo $typeoftransport ?> </h2>
                    <h2>Seats remaining:<?php echo $seatsremaining ?> </h2>
                    <h2>Number Of People: <?php echo $numberofpeople ?> </h2>
                    <h2>Total Cost: <?php echo $totalcost ?> </h2>
                    
                        
                                <?php
                                  if($numberofpeople==1)
                                  {
                                     echo' <form method="post" action="afterbooking.php">
                                         <input type="hidden" name="fromlocation" value="'.$fromlocation.'">
                            <input type="hidden" name="tolocation" value="'.$tolocation.'">
                                <input type="hidden" name="typeoftransport" value="'.$typeoftransport.'">
                                <input type="hidden" name="journeydate"  value="'.$journeydate.'"></input>
                                <input type="hidden" name="numberofpeople" value="'.$numberofpeople.'" />
                                    <input type="hidden" name="seats_id" value ="'.$seats_id.'">
                                           Name of the Passenger:<input type="text" name="nameofpassenger1">
                                             Age:<input type="text" name="ageofpassenger1" size="2">
                                           Mobile no: <input type="text" name="mobileofpassenger1" size="10">
                                            <h1> </h1>
                                            Adhaar ID:<input type="text" name="adhaarofpassenger1">
                                            Email:<input type="email" name="emailofpassenger1">
                                             <button type="submit" name="confirmbooking">Confirm</button>
                                            </form>';
                                  }
                                  
                                  if($numberofpeople==2)
                                  {
                                      echo'<form method="post" action="afterbooking.php"> 
                                            <input type="hidden" name="fromlocation" value="'.$fromlocation.'">
                            <input type="hidden" name="tolocation" value="'.$tolocation.'">
                                <input type="hidden" name="typeoftransport" value="'.$typeoftransport.'">
                                <input type="hidden" name="journeydate"  value="'.$journeydate.'"></input>
                                <input type="hidden" name="numberofpeople" value="'.$numberofpeople.'" />
                                     <input type="hidden" name="seats_id" value ="'.$seats_id.'">
                                            <h3>Details Of Passenger 1</h3> <h1> </h1>
                                             Name of Passenger:<input type="text" name="nameofpassenger1">
                                              Age:<input type="text" name="ageofpassenger1" size="2">
                                               Mobile no: <input type="text" name="mobileofpassenger1" size="10">
                                               <h1> </h1>
                                              Adhaar ID: <input type="text" name="adhaarofpassenger1">
                                              Email:<input type="email" name="emailofpassenger1">
                                             <h1> </h1>
                                      <h3>Details Of Passenger 2</h3> <h1> </h1>
                                              Name of Passenger:<input type="text" name="nameofpassenger2">
                                              Age:<input type="text" name="ageofpassenger2" size="2">
                                               Mobile no: <input type="text" name="mobileofpassenger2" size="10">
                                               <h1> </h1>
                                              Adhaar ID: <input type="text" name="adhaarofpassenger2">
                                              Email:<input type="email" name="emailofpassenger2">
                                               <button type="submit" name="confirmbooking">Confirm</button>
                                        </form>';
                                  }
                                  if($numberofpeople==3)
                                  {
                                      echo'<form method="post" action="afterbooking.php"> 
                                        <input type="hidden" name="fromlocation" value="'.$fromlocation.'">
                            <input type="hidden" name="tolocation" value="'.$tolocation.'">
                                <input type="hidden" name="typeoftransport" value="'.$typeoftransport.'">
                                <input type="hidden" name="journeydate"  value="'.$journeydate.'"></input>
                                <input type="hidden" name="numberofpeople" value="'.$numberofpeople.'" />
                                     <input type="hidden" name="seats_id" value ="'.$seats_id.'">
                                            <h3>Details Of Passenger 1</h3> <h1> </h1>
                                             Name of Passenger:<input type="text" name="nameofpassenger1">
                                              Age:<input type="text" name="ageofpassenger1" size="2">
                                               Mobile no: <input type="text" name="mobileofpassenger1" size="10">
                                               <h1> </h1>
                                              Adhaar ID: <input type="text" name="adhaarofpassenger1">
                                              Email:<input type="email" name="emailofpassenger1">
                                             <h1> </h1>
                                      <h3>Details Of Passenger 2</h3> <h1> </h1>
                                              Name of Passenger:<input type="text" name="nameofpassenger2">
                                              Age:<input type="text" name="ageofpassenger2" size="2">
                                               Mobile no: <input type="text" name="mobileofpassenger2" size="10">
                                               <h1> </h1>
                                              Adhaar ID: <input type="text" name="adhaarofpassenger2">
                                              Email:<input type="email" name="emailofpassenger2">
                                                        <h1> </h1>
                                      <h3>Details Of Passenger 3</h3> <h1> </h1>
                                              Name of Passenger:<input type="text" name="nameofpassenger3">
                                              Age:<input type="text" name="ageofpassenger3" size="2">
                                               Mobile no: <input type="text" name="mobileofpassenger3" size="10">
                                               <h1> </h1>
                                              Adhaar ID: <input type="text" name="adhaarofpassenger3">
                                              Email:<input type="email" name="emailofpassenger3">
                                               <button type="submit" name="confirmbooking">Confirm</button>
                                              

                                        </form>';
                                  }
                                  if($numberofpeople==4)
                                  {
                                      echo'<form method="post" action="afterbooking.php"> 
                                           <input type="hidden" name="fromlocation" value="'.$fromlocation.'">
                            <input type="hidden" name="tolocation" value="'.$tolocation.'">
                                <input type="hidden" name="typeoftransport" value="'.$typeoftransport.'">
                                <input type="hidden" name="journeydate"  value="'.$journeydate.'"></input>
                                <input type="hidden" name="numberofpeople" value="'.$numberofpeople.'" />
                                     <input type="hidden" name="seats_id" value ="'.$seats_id.'">
                                            <h3>Details Of Passenger 1</h3> <h1> </h1>
                                             Name of Passenger:<input type="text" name="nameofpassenger1">
                                              Age:<input type="text" name="ageofpassenger1" size="2">
                                               Mobile no: <input type="text" name="mobileofpassenger1" size="10">
                                               <h1> </h1>
                                              Adhaar ID: <input type="text" name="adhaarofpassenger1">
                                              Email:<input type="email" name="emailofpassenger1">
                                             <h1> </h1>
                                      <h3>Details Of Passenger 2</h3> <h1> </h1>
                                              Name of Passenger:<input type="text" name="nameofpassenger2">
                                              Age:<input type="text" name="ageofpassenger2" size="2">
                                               Mobile no: <input type="text" name="mobileofpassenger2" size="10">
                                               <h1> </h1>
                                              Adhaar ID: <input type="text" name="adhaarofpassenger2">
                                              Email:<input type="email" name="emailofpassenger2">
                                                        <h1> </h1>
                                      <h3>Details Of Passenger 3</h3> <h1> </h1>
                                              Name of Passenger:<input type="text" name="nameofpassenger3">
                                              Age:<input type="text" name="ageofpassenger3" size="2">
                                               Mobile no: <input type="text" name="mobileofpassenger3" size="10">
                                               <h1> </h1>
                                              Adhaar ID: <input type="text" name="adhaarofpassenger3">
                                              Email:<input type="email" name="emailofpassenger3">
                                                              <h1> </h1>
                                      <h3>Details Of Passenger 4</h3> <h1> </h1>
                                              Name of Passenger:<input type="text" name="nameofpassenger4">
                                              Age:<input type="text" name="ageofpassenger4" size="2">
                                               Mobile no: <input type="text" name="mobileofpassenger4" size="10">
                                               <h1> </h1>
                                              Adhaar ID: <input type="text" name="adhaarofpassenger4">
                                              Email:<input type="email" name="emailofpassenger4">
                                               <button type="submit" name="confirmbooking">Confirm</button>

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
