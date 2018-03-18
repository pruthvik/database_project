<?php

$dbUser="root";
$dbPass="";
$dbDatabase="test1";
$dbHost="localhost";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);

if(isset($_POST['find']))
{
   $fromlocation=mysqli_real_escape_string($dbConn,$_POST['fromlocation']);
   $tolocation=mysqli_real_escape_string($dbConn,$_POST['tolocation']);
   $typeoftransport=mysqli_real_escape_string($dbConn,$_POST['typeoftransport']);
   $journeydate=mysqli_real_escape_string($dbConn,$_POST['journeydate']);
   
   
   if($typeoftransport=='all')
   {
       
        $query=mysqli_query($dbConn,"SELECT * FROM packages WHERE package_fromlocation='$fromlocation' && package_tolocation='$tolocation'");
       
        $seatsquery=mysqli_query($dbConn,"SELECT * FROM seats_available WHERE seats_startdate='$journeydate' && seats_fromlocation='$fromlocation' && seats_tolocation='$tolocation'");
   }
   else
   {
       
       $query=mysqli_query($dbConn,"SELECT * FROM packages WHERE package_fromlocation='$fromlocation' && package_tolocation='$tolocation' && package_typeoftransport='$typeoftransport'");
       
       $seatsquery=mysqli_query($dbConn,"SELECT * FROM seats_available WHERE seats_startdate='$journeydate' && seats_typeoftransport='$typeoftransport' &&seats_tolocation='$tolocation'&& seats_fromlocation='$fromlocation' ");
        
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
                <li><a href="index.php" class="current"><span></span>Home</a></li>
                <li><a href="index.php">Tours</a></li>
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
                <h1>Packages </h1>
                <div class="content_section">
                   
                     <form method="post" action="beforeloginplaces.php" >
                         Date:<input type="date" name="journeydate"  />
                         Type of Transport:
                            <select name="typeoftransport">
                                <option selectted value="all">All</option>
                                <option value="bus">Bus</option>
                                <option value="train">Train</option>
                                <option value="flight">Flight</option>
                            </select>
                         <input type="hidden" name="fromlocation" value="<?php echo $fromlocation; ?>" />
                             <input type="hidden" name="tolocation" value="<?php echo  $tolocation; ?>" />
                                 <button type="sumbit" name="find">Find</button>
                                 </form>
                    <br>
                        
                 <?php
                
                 if($_POST['typeoftransport']!='all')
                 {
                 while($row=mysqli_fetch_assoc($query) )                
                 {
                     
                     print("<h2>"."From location:".$row['package_fromlocation']."</h2>");
                     print("<h2>"."To Location:".$row['package_tolocation']."</h2>");
                     print("<h2>"."Transport Type:".$_POST['typeoftransport']."</h2>");
                     print("<h2>"."Cost per Person:".$row['package_amount']."</h2>");
                      $costperperson=$row['package_amount'];
                     
                     print("<h2>"."Number of Days:".$row['package_numberofdays']."</h2>");
                 }
                 while($row1=mysqli_fetch_assoc($seatsquery))
                 {
                 print("<h2>"."Seats remaining in"." ".$row1['seats_typeoftransport'].":"." ".$row1['seats_remaining']."</h2>");
                 
                     $seatsremaining=$row1['seats_remaining'];
                     $seats_id=$row1['seats_id'];
                 }
                 
                 
                 
                    
    echo '<form method="post" action="checksessionplaces.php">
         <h3> Number of Persons:</h3> <select name="numberofpeople">
                            <option selectted value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>  
                        </select>
                        <input type="hidden" name="seatsremaining" value="'.$seatsremaining.'">
                         <input type="hidden" name="seats_id" value="'.$seats_id.'" >
                         <input type="hidden" name="fromlocation" value="'.$fromlocation.'" />
                         <input type="hidden" name="tolocation"    value="'.$tolocation.'" />
                         <input type="hidden" name="journeydate" value="'.$journeydate.'">
                             <input type="hidden" name="typeoftransport" value="'.$typeoftransport.'">
                                 <input type="hidden" name="costperperson" value="'.$costperperson.'">
                                
                              
                               
                            
                        <br><br>
            <button type="submit" name="submitbook">Book</button>
             </form>';   
                      
                 }
                 else
                 {
                     while($row=mysqli_fetch_assoc($query) )
                     {
                          while($row1=mysqli_fetch_assoc($seatsquery))
                          {
                      if($row['package_typeoftransport']=='train' && $row1['seats_typeoftransport']=='train')
                          {
                     print("<h2>"."From location:".$row['package_fromlocation']);
                     print("To Location:".$row['package_tolocation']."</h2>");
                     print("<h2>Transport Type:Train</h2>");
                     print("<h2>"."Cost per Person:".$row['package_amount']."</h2>");
                             $costperperson=$row['package_amount'];
                     print("<h2>"."Number of Days".$row['package_numberofdays']."</h2>");
                     print("<h2>"."Seats remaining in"." "."train:".$row1['seats_remaining']."</h2>");
                     
                              $seatsremaining=$row1['seats_remaining'];
                              $seats_id=$row1['seats_id'];
                     print("<br><br>");
                     echo '<form method="post" action="checksessionplaces.php">
                           <h3> Number of Persons:</h3>
                             <select name="numberofpeople">
                            <option selectted value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                           
                        </select>
                      <input type="hidden" name="fromlocation" value="'.$fromlocation.'" />
                         <input type="hidden" name="tolocation"    value="'.$tolocation.'" />
                         <input type="hidden" name="journeydate" value="'.$journeydate.'">
                               <input type="hidden" name="costperperson" value="'.$costperperson.'">
                                  <input type="hidden" name="seatsremaining" value="'.$seatsremaining.'">
                                      <input type="hidden" name="seats_id" value="'.$seats_id.'" >
                             <input type="hidden" name="typeoftransport" value="train">
                             <br>
                          
                        <br><br>
            <button type="submit" name="submittrainbook">Book</button>
             </form>';     
                      } 
                      
                      if($row['package_typeoftransport']=='flight' && row1['seats_typeoftransport']== 'flight' )
                             {
                     print("<h2>"."From location:".$row['package_fromlocation']);
                     print("To Location:".$row['package_tolocation']."</h2>");
                     print("<h2>Transport Type:Flight</h2>");
                     print("<h2>"."Cost per Person:".$row['package_amount']."</h2>");
                               $costperperson=$row['package_amount'];
                     print("<h2>"."Number of Days".$row['package_numberofdays']."</h2>");
                          print("<h2>"."Seats remaining in"." "."Flight:".$row1['seats_remaining']."</h2>");
                          
                          $seatsremaining=$row1['seats_remaining'];
                          $seats_id=$row1['seats_id'];
                           print("<br><br>");
                     echo '<form method="post" action="checksessionplaces.php">
                          <h3> Number of Persons:</h3><select name="numberofpeople">
                            <option selectted value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                           
                        </select>
                         <input type="hidden" name="fromlocation" value="'.$fromlocation.'" />
                         <input type="hidden" name="tolocation"    value="'.$tolocation.'" />
                         <input type="hidden" name="journeydate" value="'.$journeydate.'">
                               <input type="hidden" name="costperperson" value="'.$costperperson.'">
                                  <input type="hidden" name="seatsremaining" value="'.$seatsremaining.'">
                                      <input type="hidden" name="seats_id" value="'.$seats_id.'" >
                             <input type="hidden" name="typeoftransport" value="flight">
                             <br>
                           
                        <br><br>
            <button type="submit" name="submitflightbook">Book</button>
             </form>';     
                      }
                      if($row['package_typeoftransport']=='bus' && $row1['seats_typeoftransport']=='bus' )
                       {
                     
                     print("<h2>"."From location:".$row['package_fromlocation']."</h2>");
                     print("<h2>"."To Location:".$row['package_tolocation']."</h2>");
                     print("<h2>"."Transport Type:".$row['package_typeoftransport']."</h2>");
                     print("<h2>"."Cost per Person:".$row['package_amount']."</h2>");
                        $costperperson=$row['package_amount'];
                     print("<h2>"."Number of Days:"." ".$row['package_numberofdays']."</h2>");
                     
                     print("<h2>"."Seats remaining in"." "."Bus:".$row1['seats_remaining']."</h2>");
                     
                     $seatsremaining=$row1['seats_remaining'];
                     $seats_id=$row1['seats_id'];
                      
                     echo '<form method="post" action="checksessionplaces.php">
                           <h3>Number of Persons:</h3> <select name="numberofpeople">
                            <option selectted value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            
                        </select>
                         <input type="hidden" name="fromlocation" value="'.$fromlocation.'" />
                         <input type="hidden" name="tolocation"    value="'.$tolocation.'" />
                         <input type="hidden" name="journeydate" value="'.$journeydate.'">
                               <input type="hidden" name="costperperson" value="'.$costperperson.'">
                                  <input type="hidden" name="seatsremaining" value="'.$seatsremaining.'">
                                      <input type="hidden" name="seats_id" value="'.$seats_id.'" >
                             <input type="hidden" name="typeoftransport" value="bus">
                             <br>
                           
                       <br>
            <button type="submit" name="submitbusbook">Book</button>
             </form>';     
                      }
                          }
                 }
                  
                 }
                 ?>
                     
                </div>
                <h1><br />
                </h1>
              
              
              </div>
              <div class="content_section">
                <div class="content_section">
                
              
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
                 
                  <div class="cleaner"> </div>
                  <div class="button_01"></div>
                  <div class="cleaner"></div>
                </div>
               
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
              <h3>Goa</h3>
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

   

