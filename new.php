<?php
$servername="localhost";
$username="root";
$password="";
$dbname="test1";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
    echo "Connection Successful";
}
else {
  echo "Connection Failed";
}
$name=$_POST["name"];
$prn = $_POST["prn"];
$dob = $_POST["dob"];
$gm1 = $_POST["gm1"];
$gm2 = $_POST["gm2"];
$gm3 = $_POST["gm3"];
$sql="INSERT INTO `new1`(`name`, `prn`,`dob`,`gm1`,`gm2`,`gm3`) VALUES ('$name','$prn','$dob','$gm1','$gm2','$gm3')";
//$result=mysqli_query($conn,$sql);
//$extract="SELECT 'name' FROM 'new'";
if(mysqli_query($conn,$sql)){

  echo "\nData Entered Successfully!!<br>";
  while($row=mysqli_query($conn,$extract))
  {
    // while($row = mysqli_fetch_array($result))
    // {
        echo "Name:".$row[name];
    // }
  }

  // $extract="SELECT * FROM `new`";
  // echo mysqli_num_rows($extract);
  //mysqli_free_result($result);

}
else{
  echo "Error<br>";
}


mysqli_close($conn);

?>
