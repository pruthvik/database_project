<?php

$dbUser="root";
$dbPass="";
$dbDatabase="test1";
$dbHost="localhost";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);
if(isset($_POST['register']))
    
{
    
    
    $username=mysqli_real_escape_string($dbConn,$_POST['username']);
    $email=mysqli_real_escape_string($dbConn,$_POST['email']);
    $pass=mysqli_real_escape_string($dbConn,$_POST['password']);
    $query=mysqli_query($dbConn,"SELECT user_email FROM USERS WHERE user_email='$email'");
    if(mysqli_num_rows($query)>0)
    {
       
                
        Header("Location: ./emailexistsindex.php");
    }
    else
    {
    mysqli_query($dbConn,"INSERT INTO USERS(user_name,user_email,user_pass) VALUES ('$username','$email','$pass')");
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
                      <form action="index.php" method="post">
                          <button type="submit" name="signout">Signout</button>
                          
                  </form>
          </div>
          <!-- end of header right -->
          <div class="float_l"></div>
        </div>
        <!-- end of header -->
        <div id="content_wrapper">
          
          <div id="content_outer">
            <div id="content">
              <div class="content_section">
              
                       <?php
                      print("<h1>Welcome $username</h1>");
                       ?>
                </form>
                <h1>Plan Your Travel Here</h1>
               
                
               
                
                
</div>
              <div class="content_section">
                <div class="content_section">
                    <form  action="afterloginplaces.php" method="post">
                    <label>From Location:</label>
                    <select name="fromlocation" >
                        <option selected value="hyderabad">Hyderabad</option>
                        <option value="chennai">Chennai</option>
                                
                    </select><br><br>
                To Location: <select name="tolocation" >
                        <option  value="hyderabad">Hyderabad</option>
                        <option selected value="chennai">Chennai</option>
                                
                </select><br><br>
                        Type of Transport:
                            <select name="typeoftransport">
                                <option selectted value="all">All</option>
                                <option value="bus">Bus</option>
                                <option value="train">Train</option>
                                <option value="flight">Flight</option>
                            </select><br></br>
                                    
                        Date:<input type="date" name="journeydate"  /><br /><br>
                     <button type="sumbit" name="find">Find</button>
                     </form>
                  <h2> Tour Programs</h2>
                  <p class="em_text">&nbsp;</p>
                  <p><img src="images/madurai.jpg" style="padding:10px" width="518" height="226" alt="Madhurai" /></p>
                  <blockquote>
                    <blockquote>
                      <blockquote>
                        <blockquote>
                          <blockquote>
                            <h1>Madhurai                          </h1>
                          </blockquote>
                        </blockquote>
                      </blockquote>
                    </blockquote>
                  </blockquote>
                  <div class="cleaner"></div>
                  <div class="button_01"></div>
                  <div class="cleaner"></div></div>
                <p>&nbsp;</p>
              </div>
              <div class="content_section">
                <div class="content_section">
                  <p><img src="images/kolkata.jpg" width="518" height="226" alt="Kolkata" /></p>
<blockquote>
                    <blockquote>
                      <blockquote>
                        <blockquote>
                          <blockquote>
                            <h1>Kolkata</h1>
                          </blockquote>
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




