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
$r1=$_SESSION['r1'];
$sql = "SELECT * FROM week WHERE rolla='$r1'";
  if($res = mysqli_query($conn, $sql))
  {

      if(mysqli_num_rows($res) > 0)
      {
          while($row = mysqli_fetch_array($res))
          {
            $f1= $row['week'];
          }
      }
   }
if(isset($_POST["login"]))
{
    if(mysqli_query($conn,"select * from guide where rolln1='$r1'"))
    {

      $sql1="INSERT INTO studact(rolla, week,activity) VALUES ('$r1','$f1','$_POST[actname]')";
      if(mysqli_query($conn,$sql1))
      {

      }
          }
    else
    {
      echo "<script type='text/javascript'>alert('SORRY!! This rollno not Assigned to you');</script>";


      }
  }
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
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
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
    color: black;
    opacity: 4;
  }

  .topnav a.active {
    background-color: green;
    opacity: 4;
    color: white;
  }

  .topnav-right {
    float: right;
  }
  .container{
    background-color: lightgray;
  }
  </style>
</head>
<body>
<!-- ----------------------------------------------- -->

<div class="topnav">

    <a href="todo.html">My Task</a>
<div class="topnav-right" id="myTopnav">
      <a href="logout.php" id="logout" onclick='return confirm("Do you want to Logout?");'>Logout</a>

  </div>
</div>
  </form>

<?php
error_reporting(0);
$sql="select * from student where rolln='$r1'";
$records=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($records);

echo"<h2>"."Project Title :".$row["pname"]."</h2>";
echo"<h2>"."Rollno :".$r1."</h2>"
?>
<hr>
<table width=100%>
  <h2>
    Activities
  </h2>
  <col>
  <col>
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
    $sql="select * from student where rolln='$r1'";
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
    $sql = "SELECT * FROM studact WHERE rolla='$r1'";
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
<hr >
<form name="Regform" action="stud.php" method="post" autocomplete="off" >
   <div class ="border">
  <div  class ="container">
  <h1>Activity Upadation</h1>





    <?php
    error_reporting(0);

    $sql5="select * from studact where rolla=$r1 and week=$f1";
    if($res5 = mysqli_query($conn, $sql5))
    {
            if(mysqli_num_rows($res5) > 0)
            {
                echo "<h3>Week no :".$f1."<h3>";
              while($row = mysqli_fetch_array($res5))
              {

                if($f1==$row['week'])
                {

                  echo "<script>alert('week $f1 has been updated')</script>";


                }
              }
          }
          else {


                echo "<div class=\"row\">";
                echo "<div class=\"column\">";
                    echo "<h3>Week no :".$f1."<h3>";
                echo "</div>";
                  echo "<div class=\"column\">";
                    echo "<label for=\"actname\"><b>Activity name</b></label>";
                    echo "<input type=\"text\" name=\"actname\" placeholder=\"Activity name\" />";
                  echo "</div>";
                    echo "</div>";
                    echo "<button type=\"submit\" value=\"Save\" class=\"registerbtn\" name=\"login\">Submit</button>";

              }

            }



       ?>


</div>
</div>
</form>
</form>
</body>
</html>
