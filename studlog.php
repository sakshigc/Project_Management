<?php
if(isset($_POST["login"]))
{
$servername="localhost";
$username="root";
$password="";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);


$rolln = $_POST["rolln"];
$pass = $_POST["Password"];
$md_pass=md5($pass);
$sql="select * from student where rolln=\"$rolln\"";
$result = mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result);

if($row['rolln']==$rolln && $row['password']==$pass)
{
  session_start();
$_SESSION['r1'] =$row['rolln'] ;

  header('location:http://localhost/test/stud.php');
  //echo "valid userrrreeeeeerrrrrrrrrrrrrrrrrrr";
}
else
{
      echo "<script>alert('Invalid Login')</script>";
      header('location:http://localhost/test/studlog.html');
    }
}


?>
