<?php
error_reporting(0);
$servername="localhost";
$username="root";
$password="";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
$sql="select * from student";
$records=mysqli_query($conn,$sql);
}


?>
<!DOCTYPE html>
<html>
<head>
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
</head>
<body>
  <div class="topnav">

      <div class="topnav-right" id="myTopnav">
        <a href="report.php">Review Report</a>
        <!-- <a href="befcoview.html">View Activity</a> -->
      <a href="logout.php" onclick='return confirm("Do you want to Logout?");'>Logout</a>
  </div>

</div><br><br>
<h2 align="center">Department of Information Technology</h2><hr>

<div class="container">
  <div class="row">
    <div class="column">
      <form class="searcharea" action="" method="post">
        <input type="text" placeholder="Search By Domain..." name="search1">
      <button type="submit" value="search" name="search" class="but1">search</button>
      </form>
    </div>
     <div class="column">
       <form class="searcharea" action="" method="post">
         <input type="text" placeholder="Enter Rollno" name="rolln">
       <button type="submit" value="View Activity" name="view" class="but1">View Activity</button>
       </form>
    </div>
  </div>
</div>
  <hr><br><br>
  <?php
  error_reporting(0);
  if(isset($_POST["search"]))
  {
     session_start();
  $_SESSION['s1']=$_POST["search1"];
  header('location:http://localhost/test/search6.php');
  }
  if(isset($_POST["view"]))
  {
    session_start();
  $_SESSION['rolln']=$_POST["rolln"];
  header('location:http://localhost/test/coview.php');
  }
  ?>
  <h2 align="center">Project Groups</h2>

<table width=100%>
  <!-- <caption><b>Project Groups</b></caption> -->

  <!-- <colgroup span="4"></colgroup> -->
  <thead>
    <tr>
      <th scope="col"><b>Roll no</b></th>
      <th scope="col" ><b>Name of student</b></th>
      <th scope="col" ><b>Domain</b></th>
      <th scope="col" ><b>Name of guide</b></th>
      <th scope="col" ><b>Project title</b></th>
      <th scope="col" ><b>Sponsored company name</b></th>
    </tr>
  </thead>
  <tbody>
    <?php
    error_reporting(0);


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
          $conn->close();

    ?>

</tbody>
</table>
</body>
</html>
