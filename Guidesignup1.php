<?php
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>

  <form name="Regform" onsubmit="return valid()" method="post" autocomplete="off" action="dbmain.php" >
     <div class ="border">
  	<div  class ="container">
		<h1>Sign Up</h1>
		 <p>Please fill in this form to create an account.</p>
		  <hr >
	  </div>

   	<div class= "p">


         <label for="Name"><b>Name</b></label> <br>
         <input type="text" name="Username" placeholder="username" id="name"  /><br>

          <label for="password"><b>Password</b></label><br>
         <input type="password" name="Password" placeholder="Create password" id="pass" /><br>

         <label for="psw"><b>Confirm Password</b></label><br>
         <input type="password" name="conPassword" placeholder=" confirm password" id="cpass" /><br>


          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" value="submit" class="registerbtn">Submit</button>
    </div>

    <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
    </div>


	   </div>
  </form>


  <script type="text/javascript">

    function valid()
    {

      var user = document.forms["Regform"]["name"].value
      var pass = document.forms["Regform"]["pass"].value
      var cpass= document.forms["Regform"]["cpass"].value

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

          else
          {
            alert("thank you");
            return true;
          }

    }


  </script>

</body>
?>
</html>
