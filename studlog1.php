<?php
if($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST["login"]))
{
$servername="localhost";
$username="root";
$password="";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
    echo "Connection Successful";
}
else
{
  echo "Connection Failed";
}
$name = $_POST["Username"];
$pass = $_POST["Password"];
$md_pass=md5($pass);
$sql="select * from guide where name=\"$name\" and pass='$pass'";
$result = mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result);

if($row['name']==$name && $row['pass']==$pass)
{

  session_start();
$_SESSION['r1'] =$row['rolln1'] ;
$_SESSION['r2'] =$row['rolln2'] ;


 //echo "      valid";
  header('location: http://localhost/test2/grp1.php');
}
else
{
    //echo "      invalid";
    echo "<script type='text/javascript'>alert('Invalid Login');</script>";

}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>

  <form name="Regform" action="guidelog1.php" method="post" autocomplete="off" >
     <div class ="border">
  	<div  class ="container">
		<h1>Guide login</h1>

		  <hr >
	  </div>

   	<div class= "p">


         <label for="Name"><b>Name</b></label> <br>
         <input type="text" name="Username" placeholder="username" id="name"  /><br>


          <label for="password"><b>Password</b></label><br>
         <input type="password" name="Password" placeholder="password" id="pass" /><br>
				 <a href="change.php">forgot password</a><br><br>
				  <button type="submit" value="Login" class="registerbtn " name="login">Login</button>

    </div>
  </div>
</div>
</form>
</body>
</html>
