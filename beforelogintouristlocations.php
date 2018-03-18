<?php

$dbUser="root";
$dbPass="";
$dbDatabase="test1";
$dbHost="localhost";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);
if(isset($_POST['submitlocationtype']))
{
$locationtype=$_POST['locationtype'];
$placesquery=mysqli_query($dbConn,"SELECT * FROM locations WHERE location_type='$locationtype'");
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
                <li><a href="index.php" class="current"><span></span>Home</a></li>
            
                <li><a href="hotels.html">Hotels</a></li>
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
            <h2>Member Login</h2>
            <form action="#" method="get">
              <label>Username</label>
              <input  name="username" size="10" type="text" class="input_field" />
              
              <div class="cleaner"></div>
              <label>Password</label>
              <input type="password" value="" name="password" class="input_field" />
              <div class="cleaner"></div>
              <button type="submit" name="submit">
              <p class="button_01">Login</p>
              </button>
              
            
              </button>
            </form>
          </div>
          <!-- end of header right -->
          <div class="float_l"></div>
        </div>
        <!-- end of header -->
       
          
          <div id="content_outer">
            <div id="content">
              <div class="content_section">
                  <h1>Enter Location Type:
                      <br>
                          <form method="post" action="beforelogintouristlocations.php">
                          <h3> </h3> <select name="locationtype">
                               
                                            <option selectted value="beach">Beach</option>
                                            <option value="hillstation">Hill Station</option>
                                            <option value="monument">Monuments</option>
                                            <option value="pilgrims">Pilgrims</option>
                                    </select>
                                    <button type="submit" >Submit</button>
                          
                      </form></h1>
              
</div>
              <div class="content_section">
               <div class="content_section">
               <?php 
                 while($row=mysqli_fetch_assoc($placesquery))
                 {
                     print("<h2>"."Location:".$row['location']."</h2>");
                      print("<h2>"."Tourist Places:".$row['tourist_places']."</h2>");
                     
                 }
                 ?>
                   <h1> </h1>
                              
              
                
                
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
                   <h1>Plan Your Travel Here</h1>
                <form  action="beforeloginplaces.php" method="post">
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


