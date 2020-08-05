<?php
error_reporting(0);
if(isset($_POST["change"]))
{
$servername="localhost";
$username="root";
$password="";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
$rolln = $_POST["rolln"];
$nPassword = $_POST["newPassword"];
$dob1 = $_POST["dob"];
//$md_pass=md5($Password);
//$md_newpass=md5($nPassword);
$sql1="select * from student where rolln='$rolln'and dob='$dob1'";
$records=mysqli_query($conn,$sql1);
$row=mysqli_fetch_array($records);

if($row['rolln']==$rolln && $row['dob']== $dob1)
{
$sql = "UPDATE student SET password='$nPassword' WHERE rolln='$rolln'and dob='$dob1' ";

if (mysqli_query($conn, $sql))
{
    //echo "Record updated successfully";
    echo "<script type='text/javascript'>alert('Password Updated Successfully');</script>";
}


}
else {
  echo "<script type='text/javascript'>alert('Credentials does not match');</script>";
}
}
}




?>


<!DOCTYPE html>
<html>
<head>
  <style>
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
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="sign.css">
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
          <a href="Guidesignup.php">ProjectGuide</a>
          <a href="studsign.php">TeamLeader</a>

        </div>
      </div>
      <div class="dropdown">
      <button class="dropbtn">LogIn
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="guidelog.php">ProjectGuide</a>
        <a href="studlog.html">TeamLeader</a>
        <a href="colog.php">Coordinator</a>
      </div>
    </div>

      <a href="about.html">About</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
    </div>
    <div style="padding-left:16px">
    </div>
    <p><font color="white">successfully logged in!!!</font></p>

  <form name="Regform" action="studch.php" method="post" autocomplete="off" >
     <div class ="border">
  	<div  class ="container">
		<h1>change password</h1>

		  <hr >
	  </div>

   	<div class= "p">


      <label for="roll"><b>Rollno</b></label> <br>
      <input type="text" name="rolln" placeholder="Rollno" id="name"  /><br>

         <label for="dob"><b>DOB</b></label><br>
         <input type="date" name="dob" placeholder="DOB" id="DOB"  /><br>


         <label for="password"><b>new Password</b></label><br>
        <input type="password" name="newPassword" placeholder="new password" id="pass" /><br>

				    <button type="submit" value="submit" class="registerbtn" name="change">Submit</button>

    </div>



    </div>


	   </div>
  </form>
