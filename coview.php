<!DOCTYPE html>
<html>
<head>
	<title>View Activity</title>
	<link rel="stylesheet" type="text/css" href="sign.css">
	<style>
  * {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
/*.mySlides {display: none;}
img {vertical-align: middle;}
*/

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

.topnav-right {
  float: right;
}

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



</style>
</head>
<body>

  <div class="topnav">
		<a href="cordin1.php">Back</a>
    <div class="topnav-right" id="myTopnav">
      <a href="logout.php" onclick='return confirm("Do you want to Logout?");'>Logout</a>

      </div>
  </div>
  <div style="padding-left:16px">
  </div>
	<p><font color="white">rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr</font></p>

</body>
</html>
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
  $roll = $_SESSION['rolln'];
  $sql="select * from student where rolln=$roll";
  $records=mysqli_query($conn,$sql);

  $row=mysqli_fetch_array($records);

  echo"<h1>"."Project Title : ".$row["pname"]."</h1>";
  echo"<h2>"."Rollno : ".$roll."</h2>";
  echo"<hr>";
  echo"<table width=100%>";
    echo"<h2>Activities</h2>";
    echo"<colgroup span='4'></colgroup>";
    echo"<thead>";
      echo"<tr>";
        echo"<th scope=\"col\">Sr no</th>";
        echo"<th scope=\"col\">Students name</th>";
        echo"<th scope=\"col\" >Guide</th>";
        echo"<th scope=\"col\" >Project Topic</th>";
      echo"</tr>";
    echo"</thead>";
    echo"<tbody>";
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

    echo "</tbody>";
    echo "</table>";
  echo "<br><br><br>";
  echo"<table width=100%>";

    echo "<thead>";
    echo "<tr>";
      echo "<th scope=\"col\">Week no</th>";
      echo "<th scope=\"col\" colspan=\"4\">Activity Complete</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
      $sql = "SELECT * FROM guideact WHERE rolla=$roll";
      if($res = mysqli_query($conn, $sql))
      {
          if(mysqli_num_rows($res) > 0)
          {
              while($row = mysqli_fetch_array($res))
              {
                echo "<tr>";
                echo "<td scope=\"row\">".$row["week"]."</td>";
                echo "<td scope=\"row\" colspan='4'>".$row["status"]."</td>";

              }
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
  echo "</tbody>";
  echo "</table>";
  echo "<br><br><br>";
  echo "<table width=100%>";
  echo "<thead>";
    echo "<tr>";
      echo "<th scope=\"col\">Project Activity</th>";
      echo "<th scope=\"col\">Marks</th>";
      echo "<th scope=\"col\">Deadline</th>";
      echo "<th scope=\"col\">Followed Yes/no </th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  $sql = "SELECT * FROM marks WHERE rollm=$roll";
  if($res = mysqli_query($conn, $sql))
  {
      if(mysqli_num_rows($res) > 0)
      {
          while($row = mysqli_fetch_array($res))
          {
            echo "<tr>";
              echo "<td  scope='col'>".$row["actname"]."</td>";
              echo "<td  scope='col'>".$row["marks"]."</td>";
              echo "<td  scope='col'>".$row["deadline"]."</td>";
              echo "<td  scope='col'>".$row["follow"]."</td>";
            echo "<tr>";
          }

          mysqli_free_result($res);
      }
       else
       {
         echo "<tr>";
             echo "<td  scope='col'>"."none"."</td>";
             echo "<td  scope='col'>"."none"."</td>";
             echo "<td  scope='col'>"."none"."</td>";
             echo "<td  scope='col'>"."none"."</td>";
           echo "<tr>";
      }
    }
     echo "</tbody>";
       echo "</table>";
   }
?>
