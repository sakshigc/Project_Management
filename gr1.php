<?php
$servername="localhost";
$username="root";
$password="";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{


session_start();
$r1=$_SESSION['r1'];

if(isset($_POST["login"]))
{
    if(mysqli_query($conn,"select * from guide where rolln1='$r1'"))
    {

      $sql1="INSERT INTO guideact (rolla, week, status) VALUES ('$r1','$_POST[weekno]','$_POST[status]')";
      if(mysqli_query($conn,$sql1))
      {

        $sql2="INSERT INTO marks (rollm, actname, marks,follow,deadline) VALUES ('$r1','$_POST[actname]','$_POST[marks]','$_POST[follow]','$_POST[deadline]')";
        if(mysqli_query($conn,$sql2))
        {
          header('location: http://localhost/grp2.php');
        }
        else
        {
            echo "<script type='text/javascript'>alert('Data not inserted');</script>";
        }
      }
    }
    else
    {
      echo "<script type='text/javascript'>alert('SORRY!! This rollno not Assigned to you');</script>";


      }
  }
}
else
{
  echo "<script type='text/javascript'>alert('Connection failed');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <!-- <link rel="stylesheet" type="text/css" href="sign.css"> -->
<style>

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}

.top
{
  background-color: black;
  opacity: .8;
  overflow: hidden;;

}
.top a
{
  float: left;
  color: white;
  text-align: center;
  padding: 30px 30px;
  font-size: 15px;
}
.top a:hover
{
  background-color: green;
  color: white;

}
.top a.active
{
  background-color: black;
  opacity: .8;
  color: white;
}
.registerbtn {
  background-color: black;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}
input[type="text"],input[type="date"] {
    width:45%;
    display: inline-block;
}
.row {
  display: flex;
}

/* Create two equal columns that sits next to each other */
.column {
  flex: 50%;
  padding: 10px;
  height: 50px; /* Should be removed. Only for demonstration */
}
input, label {
    display:block;
}

* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
max-width: 1000px;
position: relative;
margin: auto;
}

/* Caption text */
.text {
color: #f2f2f2;
font-size: 15px;
padding: 8px 12px;
position: absolute;
bottom: 8px;
width: 100%;
text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
color: #f2f2f2;
font-size: 12px;
padding: 8px 12px;
position: absolute;
top: 0;
}

/* The dots/bullets/indicators */
.dot {
height: 15px;
width: 15px;
margin: 0 2px;
background-color: #bbb;
border-radius: 50%;
display: inline-block;
transition: background-color 0.6s ease;
}

.active {
background-color: #717171;
}

/* Fading animation */
.fade {
-webkit-animation-name: fade;
-webkit-animation-duration: 1.5s;
animation-name: fade;
animation-duration: 1.5s;
}

@-webkit-keyframes fade {
from {opacity: .4}
to {opacity: 1}
}

@keyframes fade {
from {opacity: .4}
to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
.text {font-size: 11px}
}
body {margin:0;font-family:Arial}

.topnav {
overflow: hidden;
background-color: #333;
}

.topnav a {
float: left;
display: block;
color: green;
text-align: center;
padding: 50% 30%;
text-decoration: none;
font-size: 17px;
}

.active {
background-color: green;
color: white;
}

.topnav .icon {
display: none;
}

.dropdown {
float: left;
overflow: hidden;
}

.dropdown .dropbtn {
font-size: 17px;
border: none;
outline: none;
color: white;
padding: 14px 16px;
background-color: inherit;
font-family: inherit;
margin: 0;
}

.dropdown-content {
display: none;
position: absolute;
background-color: #f9f9f9;
min-width: 50px;
width:130px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
z-index: 1;
}

.dropdown-content a {
float: none;
color: black;
background-color: gray;
padding: 10% ;
min-width: 160px;
text-decoration: none;
display: block;
text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
background-color: green;
color: black;
}

.dropdown-content a:hover {
background-color: black;
color: black;
}

.dropdown:hover .dropdown-content {
display: block;
}

@media screen and (max-width: 600px) {
.topnav a:not(:first-child), .dropdown .dropbtn {
  display: none;
}
.topnav a.icon {
  float: right;
  display: block;
}
}

@media screen and (max-width: 600px) {
.topnav.responsive {position: relative;}
.topnav.responsive .icon {
  position: absolute;
  right: 0;
  top: 0;
}
.topnav.responsive a {
  float: center;
  display: block;
  text-align: left;
}
.topnav.responsive .dropdown {float: none;}
.topnav.responsive .dropdown-content {position: relative;}
.topnav.responsive .dropdown .dropbtn {
  display: block;
  width: 100%;
  text-align: left;
}
}
.topnav {

overflow: hidden;
background-color: black;
}

.topnav a {

float: left;
color: #f2f2f2;
text-align: center;
padding: 14px 16px;
text-decoration: none;
font-size: 17px;
}

.topnav a:hover {
background-color:  #4CAF50;
color: black;
}

.topnav a.active {
background-color: #4CAF50;
color: white;
}

.topnav-right {
float: right;
}
</style>
</head>
<body>
<div class="topnav">
<a href="#"><b><font size="15">ProManager</font><b></a>
<div class="topnav-right" id="myTopnav">
  <a href="main5.html">Home</a>
    <div class="dropdown">
    <button class="dropbtn">SignUp
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="Guidesignup.html">ProjectGuide</a>
      <a href="studsign.html">TeamLeader</a>
      <a href="#">Coordinator</a>
    </div>
  </div>
  <div class="dropdown">
  <button class="dropbtn">LogIn
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content">
    <a href="guidelog.html">ProjectGuide</a>
    <a href="studlog.html">TeamLeader</a>
    <a href="#">Coordinator</a>
  </div>
</div>

  <a href="#about">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
</div>
<div style="padding-left:16px">
</div>
<p><font color="white">rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr</font></p>

  <div class="top">


    <a class="active" id="a"href="guidemain1.html"><strong>Group1    </strong></a>
    <a class="active" href="guidesub1.html"><strong>Group2     </strong></a>

  </div>
<?php
$sql="select * from student where rolln='$r1'";
$records=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($records);

echo"<h2>"."Project Title :".$row["pname"]."</h2>";
echo"<h2>"."Rollno :".$r1."</h2>"
?>
<hr>
<table width=50%>
  <h2>
    Activities
  </h2>
  <col>
  <col>
  <colgroup span="4"></colgroup>
  <thead>
    <tr>
      <th scope="col"><b>Sr no</b></th>
      <th scope="col"><b>Students name</b></th>
      <th scope="col" ><b>Guide</b></th>
      <th scope="col" ><b>Project Topic</b></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="select * from student where rolln='$r1'";
    $records=mysqli_query($conn,$sql);

  $row=mysqli_fetch_array($records);

  echo "<tr>";

      echo "<td scope=\"row\">"."1"."</td>";
      echo "<td scope=\"row\">".$row["sname"]."</td>";
      echo "<td rowspan=\"4\" scope=\"rowgroup\">".$row["guiden"]."</td>";
      echo "<td rowspan=\"4\" scope=\"rowgroup\">".$row["pname"]."</td>";

    echo "</tr>";
    echo "<tr>";
      echo "<td scope=\"row\">"."2"."</td>";
      echo "<td scope=\"row\">".$row["gm1"]."</td>";
    echo "</tr>";
    echo "<tr>";
      echo "<td scope=\"row\">"."3"."</td>";
      echo "<td scope=\"row\">".$row["gm2"]."</td>";
    echo "</tr>";
    echo "<tr>";
      echo "<td scope=\"row\">"."4"."</td>";
      echo "<td scope=\"row\">".$row["gm3"]."</td>";
    echo "</tr>";


    ?>
  </tbody>
<thead>
  <tr>
    <th scope="col">Week no</th>
    <th scope="col" colspan="4">Activity Complete</th>
  </tr>
</thead>
<tbody>

    <?php
    $sql = "SELECT * FROM guideact WHERE rolla='$r1'";
    if($res = mysqli_query($conn, $sql))
    {
        if(mysqli_num_rows($res) > 0)
        {
            while($row = mysqli_fetch_array($res))
            {
              echo "<tr>";
              echo "<td scope=\"row\">".$row["week"]."</td>";
              echo "<td scope=\"row\" colspan='4'>".$row["status"]."</td>";

            }
            echo "</table>";
            mysqli_free_result($res);
        }
         else
         {
           echo "<tr>";
           echo "<td scope=\"row\">"."none"."</td>";
           echo "<td scope=\"row\" colspan='4'>"."none"."</td>";
        }
      }
        // -----------------------------------------------------------------------------

    ?>
</tbody>
</table>
<table width=100%>
<thead>
  <tr>
    <th scope="col">Project Activity</th>
    <th scope="col">Marks</th>
    <th scope="col">Deadline</th>
    <th scope="col">Followed Yes/no </th>
  </tr>
</thead>
<?php
echo "<tbody>";
$sql = "SELECT * FROM marks WHERE rollm='$r1'";
if($res = mysqli_query($conn, $sql))
{
    if(mysqli_num_rows($res) > 0)
    {
        while($row = mysqli_fetch_array($res))
        {
          echo "<tr>";
            echo "<td  scope='col'>".$row["actname"]."</td>";
            echo "<td  scope='col'>".$row["marks"]."</td>";
            echo "<td  scope='col'>".$row["deadline"]."</td>";
            echo "<td  scope='col'>".$row["follow"]."</td>";
          echo "<tr>";
        }
        echo "</table>";
        mysqli_free_result($res);
    }
     else
     {
       echo "<tr>";
           echo "<td  scope='col'>"."none"."</td>";
           echo "<td  scope='col'>"."none"."</td>";
           echo "<td  scope='col'>"."none"."</td>";
           echo "<td  scope='col'>"."none"."</td>";
         echo "<tr>";
    }
  }
   echo "</tbody>";
  ?>

</table>
<hr >
<form name="Regform" action="g1.php" method="post" autocomplete="off" >
   <div class ="border">
  <div  class ="container">
  <h1>Activity Upadation</h1>


  </div>


  <div class="row">
    <div class="column">
      <label for="week no"><b>week no</b></label>
      <input type="text" name="weekno" placeholder="week no" />
    </div>
    <div class="column">
      <label for="status"><b>Status completed</b></label>
    <input type="text" name="status" placeholder="Status completed" />
    </div>
  </div>
  <div class="row">
    <div class="column">
      <label for="actname"><b>Activity name</b></label>
      <input type="text" name="actname" placeholder="Activity name" />
    </div>
    <div class="column">
      <label for="deadline"><b>Deadline</b></label>
      <input type="date" name="deadline" placeholder="Deadline" />
    </div>
  </div>
  <div class="row">
    <div class="column">
      <label for="marks"><b>marks</b></label>
      <input type="text" name="marks" placeholder="marks" />

    </div>
    <div class="column">
      <label for="follow"><b>Followed or not</b></label>
      <input type="text" name="follow" placeholder="Followed or not"/>

    </div>
  </div>

  <button type="submit" value="Save" class="registerbtn" name="login">Submit</button>
</form>
</form>
</body>
</html>
