<?php
if(isset($_POST["submit"]))
{
$servername="localhost";
$username="root";
$password="";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
  $sname1= $_POST["Username"];
  $rolln = $_POST["rolln"];
  $dob1 = $_POST["dob"];
  $gm11 = $_POST["gm1"];
  $gm21 = $_POST["gm2"];
  $gm31 = $_POST["gm3"];
  $pname1= $_POST["project"];
  $domain1= $_POST["doname"];
  $spon1= $_POST["scn1"];
  $guide1= $_POST["gname"];
  $password1=$_POST["Password"];
  $md_pass1=md5($password1);
  $conPassword= $_POST["conPassword"];
  $md_conpass=md5($conPassword);
  $sql="INSERT INTO `student`(`rolln`, `sname`, `dob`, `password`, `gm1`, `gm2`, `gm3`, `pname`, `domain`, `spname`, `guiden`)
  VALUES ('$rolln','$sname1','$dob1','$conPassword','$gm11','$gm21','$gm31','$pname1','$domain1','$spon1','$guide1')";
//$result=mysqli_query($conn,$sql);
//$extract="SELECT 'name' FROM 'new'";
if(mysqli_query($conn,$sql))
{
 echo "\nData Entered Successfully!!<br>";
//header('location :http://localhost/guidemain2.html');
}
else
  {
  //header('location :http://localhost/guidemain2.html');
  echo "nahuiiiii";
  }
  mysqli_close($conn);
}
else
{
  echo "\nerror<br>";
}

}
?>


<html>
<head>
  <title>Signup</title>
  <link rel="stylesheet" type="text/css" href="sign.css">
</head>
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

    <a href="#about">About</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  </div>
  </div>
  <div style="padding-left:16px">
  </div>
  <p><font color="white">rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr</font></p>


  <form name="Regform" onsubmit="return valid()" method="post" autocomplete="off" action="ttt.php">
     <div class ="border">
    <div  class ="container">
    <h1>Sign Up</h1>

      <hr >
    </div>

    <div class= "p">


         <label for="Name"><b>Name</b></label> <br>
         <input type="text" name="Username" placeholder="username" id="name"  /><br>

          <label for="password"><b>Password</b></label><br>
         <input type="password" name="Password" placeholder="Create password" id="pass" /><br>

         <label for="psw"><b>Confirm Password</b></label><br>
         <input type="password" name="conPassword" placeholder=" confirm password" id="cpass" /><br>

         <label for="grps"><b>Assigned Groups</b></label> <br>
          <input type="text" name="rolln1" placeholder="roll no 1" id="roll1" /><br>
          <input type="text" name="rolln2" placeholder="roll no 2" id="roll2" /><br>

         <label for="date"><b>DOB</b></label><br>
         <input type="date" name="dob" placeholder="Enter date" id="dob" /><br>


    <button type="submit" value="submit" class="registerbtn" name="submit">Submit</button>
    </div>
     </div>
  </form>


  <script type="text/javascript">

    function valid()
    {

      var user = document.forms["Regform"]["name"].value
      var pass = document.forms["Regform"]["pass"].value
      var cpass= document.forms["Regform"]["cpass"].value
      var rolln1=document.forms["Regform"]["rolln1"].value
      var rolln2=document.forms["Regform"]["rolln2"].value
        var dob=document.forms["Regform"]["dob"].value
          if(user=="")
          {
            //document.getElementById("name").innerHTML=user.Please Enter Username;
              alert("Enter Username");
             document.getElementById("name").focus();
            return false;
          }

                    if(pass=="")
          {
            alert("Enter password");
            document.getElementById("pass").focus();
            return false;
          }

          if(cpass=="")
          {
            alert("Confirm your password");
            document.getElementById("cpass").focus();
            return false;
          }

          else if(cpass != pass)
          {
            alert("Enter Correct Password");
            return false;
          }
          else if(rolln1=="")
          {
            alert("Enter roll no1");
            return false;
          }
          else if(rolln2=="")
          {
            alert("Enter roll no2");
            return false;
          }
          else if(dob=="")
          {
            alert("Enter Date of birth");
            return false;
          }
          else
          {
            alert("thank you");
            return true;
          }

    }


  </script>

</body>
</html>
