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
$r2=$_SESSION['r2'];
}
else
{
  echo "<script type='text/javascript'>alert('Connection failed');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- <link rel="stylesheet" type="text/css" href="sign.css"> -->
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
    /*cursor: pointer;*/
    width: 100%;

  }

  .registerbtn:hover {
    background-color: green;
    opacity:2;
  }
  input[type="text"],input[type="date"] {
      width:45%;
      display: inline-block;
  }
  .row {
    display: flex;
  }


  .column {
    flex: 50%;
    padding: 10px;
    height: 50px;
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
    background-color: lightgray;
    color: black;
  }

  .topnav a.active {
    background-color: green;
    opacity: 4;
    color: white;
  }

  .topnav-right {
    float: right;
  }


  .go{
     background-color: dimgray; /* Green */
  border-radius: 50%;
  color: black;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  }

  .go:hover{
    background-color: green;
    opacity: 4;
  }
  .container{
    background-color: lightgray;
  }
  </style>
</head>
<body>
<!-- ----------------------------------------------- -->

<div class="topnav">
  <a href="gview.php">Back</a>
    <a   href="g1.php">Group 1</a>
      <a href="grp2.php">Group 2</a>
      <a class="active" href="gs1.php">Student Activity</a>

<div class="topnav-right" id="myTopnav">

<a href="gs1.php">Activity1</a>
  <a class="active" href="gs2.php">Activity2</a>
  <a href="logout.php" id="logout" onclick='return confirm("Do you want to logout?");'>Logout</a>
  </div>
</div>
<!-- --------------------------------------------------------------- -->

    <!-- <a class="active" id="a"href="grp1.php"><strong>Group1    </strong></a>
    <a class="active" href="grp2.php"><strong>Group2     </strong></a> -->

<?php
error_reporting(0);
$sql="select * from student where rolln='$r2'";
$records=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($records);

echo"<h2>"."Project Title :".$row["pname"]."</h2>";
echo"<h2>"."Rollno :".$r2."</h2>"
?>
<hr>
<table width=100%>
  <h2>
    Activities
  </h2>
  <colgroup span="4"></colgroup>
  <thead>
    <tr>
      <th scope="col"><b>Sr no</b></th>
      <th scope="col"><b>Team Members</b></th>
      <th scope="col" ><b>Guide</b></th>
      <th scope="col" ><b>Project Topic</b></th>
    </tr>
  </thead>
  <tbody>
    <?php
    error_reporting(0);
    $sql="select * from student where rolln='$r2'";
    $records=mysqli_query($conn,$sql);

  $row=mysqli_fetch_array($records);

  echo "<tr>";

      echo "<td scope=\"row\">"."1"."</td>";
      echo "<td scope=\"row\">".$row["sname"]."</td>";
      echo "<td rowspan=\"4\" scope=\"rowgroup\">".$row["guiden"]."</td>";
      echo "<td rowspan=\"4\" scope=\"rowgroup\">".$row["pname"]."</td>";

    echo "</tr>";
    echo "<tr>";
      echo "<td scope=\"row\">"."2"."</td>";
      echo "<td scope=\"row\">".$row["gm1"]."</td>";
    echo "</tr>";
    echo "<tr>";
      echo "<td scope=\"row\">"."3"."</td>";
      echo "<td scope=\"row\">".$row["gm2"]."</td>";
    echo "</tr>";
    echo "<tr>";
      echo "<td scope=\"row\">"."4"."</td>";
      echo "<td scope=\"row\">".$row["gm3"]."</td>";
    echo "</tr>";


    ?>
  </tbody>
</table><br><br><br>
<table width=100%>
<thead>

  <tr>
    <th scope="col">Week no</th>
    <th scope="col" colspan="4">Activity Complete</th>
  </tr>
</thead>
<tbody>

    <?php
    error_reporting(0);
    $sql = "SELECT * FROM studact WHERE rolla='$r2'";
    if($res = mysqli_query($conn, $sql))
    {
        if(mysqli_num_rows($res) > 0)
        {
            while($row = mysqli_fetch_array($res))
            {
              echo "<tr>";
              echo "<td scope=\"row\">".$row["week"]."</td>";
              echo "<td scope=\"row\" colspan='4'>".$row["activity"]."</td>";

            }
            echo "</table>";
            mysqli_free_result($res);
        }
         else
         {
           echo "<tr>";
           echo "<td scope=\"row\">"."none"."</td>";
           echo "<td scope=\"row\" colspan='4'>"."none"."</td>";
        }
      }
        // -----------------------------------------------------------------------------

    ?>
</tbody>
</table>
</body>
</html>
