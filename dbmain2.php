<?php
$servername="localhost";
$username="root";
$password="";
$dbname="main4";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
    echo "Connection Successful";
}
else {
  echo "Connection Failed";
}

$sname1= $_POST["Username"];
//$prn1 = $_POST["prn"];
$dob1 = $_POST["dob"];
$gm11 = $_POST["gm1"];
$gm21 = $_POST["gm2"];
$gm31 = $_POST["gm3"];
$pname1= $_POST["project"];
$domain1= $_POST["doname"];
$spon1= $_POST["scn1"];
$password1=$_POST["Password"];
//$md_pass1=md5($password1);
//$conPassword= $_POST["conPassword"];
//$md_conpass=md5($conPassword);
//$md_pass1=md5($password1);

//$sql2="INSERT INTO student INNER JOIN project on student.grid=projet.grid";
$sql="INSERT INTO `new1`(`sname`, `dob`, `password`, `gm1`, `gm2`, `gm3`) VALUES(`$sname1`,`$dob1`,`$password1`,`$gm11`,`$gm21`,`$gm31`)";
$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
if($query==1)
{
  $sql1="INSERT INTO `new2`(`pname`,`domain`,`spon`) VALUES('$pname1',`$domain1`,`$spon1`)";
  //$sql = mysqli_query("INSERT INTO TABLE1(field1, field2, field3) VALUES('value1',value2,value3) INSERT INTO STOCK(field) VALUES ('value1')");
  $query1=mysqli_query($conn,$sql1);
  if($query1==1)
  {
    echo"successful";
  }
  else
    {
      echo"error";
    }

}


//$sql1="INSERT INTO `project`(`pname`,`domain`,`spon`) VALUES('$pname1',`$domain1`,`$spon1`)";
//$sql = mysqli_query("INSERT INTO TABLE1(field1, field2, field3) VALUES('value1',value2,value3) INSERT INTO STOCK(field) VALUES ('value1')");


// if(mysqli_query($conn,$sql2))
// {
//
//    echo "\nData Entered Successfully!!<br>";
//
// }
// // elseif(mysqli_query($conn,$sql1))
// // {
// //   echo "\nData Entered Successfully!!<br>";
// // }
// else{
//   echo "Error<br>";
//
// }


mysqli_close($conn);

?>
