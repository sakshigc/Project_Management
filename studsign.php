<?php
 error_reporting(0);
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


if($spon1=="")
{
  $spon1="none";
}
$sql="INSERT INTO `student`(`rolln`, `sname`, `dob`, `password`, `gm1`, `gm2`, `gm3`, `pname`, `domain`, `spname`, `guiden`)
VALUES ('$rolln','$sname1','$dob1','$conPassword','$gm11','$gm21','$gm31','$pname1','$domain1','$spon1','$guide1')";

if(mysqli_query($conn,$sql))
{




}

else{




}
}

mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Sign Up</title>
	<link rel="stylesheet" type="text/css" href="sign.css">

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
        <a href="#">Coordinator</a>
      </div>
    </div>

      <a href="#about">About</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
    </div>
    <div style="padding-left:16px">
    </div>
    <p><font color="white">successfully signed up!!!</font></p>

<form name="Regform" onsubmit="return valid()" method="post" autocomplete="off" action="studsign.php" >
     <div class ="border">
  	<div  class ="container">
		<h1>Student Sign Up</h1>


		  <hr >
	  </div>

   	<div class= "p">


         <label for="Name"><b>Name</b></label> <br>
         <input type="text" name="Username" placeholder="username" id="name"  /><br>


        <label for="rolln"><b>rolln</b></label> <br>
         <input type="text" name="rolln" placeholder="roll no" id="roll" /><br>

        <label for="DOB"><b>Date of Birth &nbsp &nbsp &nbsp</b></label>
         <input type="date" name="dob"  id="dob" /><br> <br>



				 <label for="password"><b>Password</b></label><br>
				<input type="password" name="Password" placeholder=" password" id="pass" /><br>

				<label for="psw"><b>Confirm Password</b></label><br>
				<input type="password" name="conPassword" placeholder=" confirm password" id="cpass" /><br>



         <label for="email"><b>Group Members</b></label><br>
         <input type="text" name="gm1" placeholder="Group mem 1" id="gm1" /><br>
         <input type="text" name="gm2" placeholder="Group mem 2" id="gm2" /><br>
         <input type="text" name="gm3" placeholder="Group mem 3" id="gm3" /><br>

         <label for="pn"><b>Project name</b></label><br>
         <input type="text" name="project" placeholder="Project name" id="pname" /><br>

        <label for="dm"><b>Domain</b></label><br>
         <input type="text" name="doname" placeholder="Domain name" id="dname" /><br>

         <!-- <label for="Sp"><b>Is_sponsored  &nbsp &nbsp &nbsp</b></label> <br><br>
           <input type="radio" name="sp1" value="yes" id="sp1"> <b>Yes &nbsp &nbsp</b>
            <input type="radio" name="sp1" value="no" id="sp2"> <b>No</b><br><br> -->

            <label for="spname"><b>Sponsored company name </b></label><br>
         <input type="text" name="scn1" placeholder="Sponsored company name " id="scn1" /><br>


				 <label for="spname"><b>Guidename</b></label><br>
			<input type="text" name="gname" placeholder="guidename" id="guiden" /><br>

			<button type="submit" value="submit" class="registerbtn" name="submit">Submit</button>
    </div>




	   </div>
  </form>
  <script type="text/javascript">

    function valid()
    {

      var user = document.forms["Regform"]["name"].value
    //  var filter = /[a-zA-Z]/
    //var namef=filter.test(document.Regform.name.value);
      var roll = document.forms["Regform"]["roll"].value
      //var mail = document.forms["Regform"]["email"].value
      var dob=document.forms["Regform"]["dob"].value
      var pass = document.forms["Regform"]["pass"].value
      var cpass= document.forms["Regform"]["cpass"].value
      var gm11 = document.forms["Regform"]["gm1"].value
      var gm22 = document.forms["Regform"]["gm2"].value
      var gm33 = document.forms["Regform"]["gm3"].value
      var project = document.forms["Regform"]["pname"].value
      var doname = document.forms["Regform"]["dname"].value
      var coname = document.forms["Regform"]["scn1"].value

      var gname =  document.forms["Regform"]["guiden"].value



          if(user=="")
          {
            alert("Enter Username");
            // document.getElementById("name").focus();
            return false;
          }

          if(roll=="")
          {
            alert("Enter PRN");
          //  document.getElementById("prn").focus();
            return false;
          }
          else if(dob=="")
          {
            alert("Enter Date of birth");
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

           else if(gm11=="")
          {
              alert("Enter Groupmember1 name");
             //document.getElementById("gm1").focus();
            return false;
          }
           else if(gm22=="")
          {
              alert("Enter Groupmember2 name");
             //document.getElementById("gm2").focus();
            return false;
          }
           else if(gm33=="")
          {
              alert("Enter Groupmember3 name");
             //document.getElementById("gm3").focus();
            return false;
          }

          else if(project=="")
          {

              alert("Enter project Name");
             //document.getElementById("pname").focus();
            return false;
          }

          else if(doname=="")
          {

              alert("Enter Domain Name");
             //document.getElementById("dname").focus();
            return false;
          }

          // else if(coname=="")
          // {

          //     alert("Enter company Name");
          //    document.getElementById("scn1").focus();
          //   return false;
          // }
          else if(gname=="")
          {

              alert("Enter guidename Name");
             //document.getElementById("dname").focus();
            return false;
          }

          else
          {
            alert("thank you");
            return true;
          }

    }


  </script>



</html>
