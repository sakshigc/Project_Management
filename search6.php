<?php
error_reporting(0);
$servername="localhost";
$username="root";
$password="";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{

session_start();
$s1=$_SESSION['s1'];
  $sql="select * from student where domain='$s1'";
  $records=mysqli_query($conn,$sql);
  echo "<table width=100%>";
    echo "<caption><h2>Project Groups</h2></caption>";

    echo "<colgroup span=\"4\"></colgroup>";
    echo "<thead>";
      echo "<tr>";
        echo "<th scope=\"col\"><b>Group no</b></th>";
        echo "<th scope=\"col\" ><b>Name of student</b></th>";
        echo "<th scope=\"col\" ><b>Domain</b></th>";
        echo "<th scope=\"col\" ><b>Name of guide</b></th>";
        echo "<th scope=\"col\" ><b>Project title</b></th>";
        echo "<th scope=\"col\" ><b>Sponsored company name</b></th>";
      echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
  while($row=mysqli_fetch_array($records))
  {
    echo "<tr>";
      echo "<td rowspan=\"4\" scope=\"rowgroup\">".$row["rolln"]."</td>";
      echo "<td scope=\"row\">".$row["sname"]."</td>";
      echo "<td rowspan=\"4\" scope=\"rowgroup\">".$row["domain"]."</td>";
      echo "<td rowspan=\"4\" scope=\"rowgroup\">".$row["guiden"]."</td>";
      echo "<td rowspan=\"4\" scope=\"rowgroup\">".$row["pname"]."</td>";
      echo "<td rowspan=\"4\" scope=\"rowgroup\">".$row["spname"]."</td>";
    echo "</tr>";
    echo "<tr>";
      echo "<td scope=\"row\">".$row["gm1"]."</td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td scope=\"row\">".$row['gm2']."</td>";
      echo "</tr>";
    echo "<tr>";
      echo "<td scope=\"row\">".$row["gm3"]."</td>";
    echo "</tr>";
  }
}
else {
  //echo "Connection Failed";
}

?>
<!DOCTYPE html>
<html>


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

th{
    padding: 5px;
    text-align: center;
    background-color: dimgray;
  }

  td{
    padding: 5px;
    text-align: center;
  }

  tr:nth-child(even) {background-color: lightgray;}



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
.container{
  background-color: gray;
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

.topnav {
    overflow: hidden;
    background-color: black;
    padding: 15px 20px;
  }

  .topnav a {
    float:left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  .topnav a:hover {
    background-color: green;
    opacity: 4;
    color: white;
  }

 /* .topnav a.active {
    background-color: green;
    opacity: 4;
    color: white;
  }*/


.topnav-right {
  float: right;
}
.searcharea{
  margin-top: 20px;
}
</style>
<body>
  <div class="topnav">
      <a href="cordin1.php">Back</a>
      <div class="topnav-right" id="myTopnav">
        <a href="report.php">Review Report</a>
        <!-- <a href="befcoview.html">View Activity</a> -->
      <a href="logout.php" onclick='return confirm("Do you want to Logout?");'>Logout</a>
  </div>

  </div>
  <h2 align="center">Department of Information Technology</h2><hr>

  <div class="container">
  <div class="row">
     <div class="column">
       <form class="searcharea" action="" method="post">
         <input type="text" placeholder="Enter Rollno" name="rolln">
       <button type="submit" value="View Activity" name="view">View</button>
       </form>
    </div>
  </div>
  </div>
  <?php
   error_reporting(0);
  if(isset($_POST["view"]))
  {

  $_SESSION['rolln']=$_POST["rolln"];
  header('location:http://localhost/test/coview.php');
  }
  ?>
  <hr><br>

</body>
</html>
