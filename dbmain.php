<?php
$servername="localhost";
$username="root";
$password="";
$dbname="main";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
    echo "Connection Successful";
}
else {
  echo "Connection Failed";
}
$Username=$_POST["Username"];
$Password = $_POST["Password"];
$conPassword = $_POST["conPassword"];
$md_pass=md5($Password);
$md_conpass=md5($conPassword);


$sql="INSERT INTO `guidesign`(`Username`,`Password`,`conPassword`) VALUES ('$Username','$md_pass','$md_conpass')";
//$result=mysqli_query($conn,$sql);
//$extract="SELECT 'name' FROM 'new'";
if(mysqli_query($conn,$sql)){

  echo "\nData Entered Successfully!!<br>";
  // $extract="SELECT * FROM `new`";
  // echo mysqli_num_rows($extract);
  //mysqli_free_result($result);

}
else{
  echo "Error<br>";
}


mysqli_close($conn);

?>
