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
      if(($_POST["status"]!=""))
      {
        $sql1="INSERT INTO guideact (rolla, week, status) VALUES ('$r1','$f1','$_POST[status]')";
          if(mysqli_query($conn,$sql1))
          {
            echo "<script type='text/javascript'>alert('Status updated')</script>";
          }
        }
        if(($_POST["actname"]!="") && ($_POST["marks"]!="") && ($_POST["follow"]!="") && ($_POST["deadline"]!=""))
        {
          $sql2="INSERT INTO marks (rollm, actname, marks,follow,deadline) VALUES ('$r1','$_POST[actname]','$_POST[marks]','$_POST[follow]','$_POST[deadline]')";
            if(mysqli_query($conn,$sql2))
            {
                echo "<script type='text/javascript'>alert('Data updated');</script>";
            }
        }
  }
        else
        {
            echo "<script type='text/javascript'>alert('Data not inserted');</script>";
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
  <!-- <a href="#"><b><font size="15">ProManager</font><b></a> -->
<a href="gview.php">Back</a>
  <a  class="active" href="g1.php">Group 1</a>
    <a href="grp2.php">Group 2</a>
    <a href="gs1.php">Student Activity</a>
<div class="topnav-right" id="myTopnav">
      <a href="logout.php" onclick='return confirm("Do you want to Logout?");'>Logout</a>
  </div>
</div>
<!-- --------------------------------------------------------------- -->

    </form>

<?php
error_reporting(0);
$sql="select * from student where rolln='$r1'";
$records=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($records);

echo"<h2>"."Project Title :".$row["pname"]."</h2>";
echo"<h2>"."Rollno :".$r1."</h2>"
?>
<hr><br>
<form method="post" action="" name="Regform">

  <label for="week no"><b>week no</b></label>
  <input type="text" name="week" placeholder="1 - 12" />
 <div class="go"><button type="submit" name="go">go</button></div> <br><br>

  <?php
  error_reporting(0);
  if(isset($_POST["go"]))
  {
    if(mysqli_query($conn,"select * from guide where rolln1='$r1'"))
    {
          $sql4="INSERT INTO week (rolla,week) VALUES ('$r1','$_POST[week]')";
          if(mysqli_query($conn,$sql4))
          {
                echo "<script type='text/javascript'>alert('Week updated')</script>";
          }
    }
  }


  ?>
  <hr>
<table width=100%>
  <h2>    Activities  </h2>


  <colgroup span="4"></colgroup>
  <thead>
    <tr>
      <th scope="col"><b>Sr no</b></th>
      <th scope="col"><b>Students name</b></th>
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
<table width="100%">

<thead>
  <tr>
    <th scope="col">Week no</th>
    <th scope="col" colspan="4">Activity Complete</th>
  </tr>
</thead>
<tbody>

    <?php
    error_reporting(0);
    $sql = "SELECT * FROM guideact WHERE rolla='$r1'";
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
</table><br><br><br>
<table width=100%>
<thead>
  <tr>
    <th scope="col">Project Activity</th>
    <th scope="col">Marks</th>
    <th scope="col">Deadline</th>
    <th scope="col">Followed Yes/no </th>
  </tr>
</thead>
<?php
error_reporting(0);
echo "<tbody>";
$sql = "SELECT * FROM marks WHERE rollm='$r1'";
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
        echo "</table>";
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
  ?>

</table>
<hr >
<form name="Regform" action="g1.php" method="post" autocomplete="off" >
   <div class ="border">
  <div  class ="container">
  <h1>Activity Upadation</h1>




  <div class="row">
    <div class="column">
    <?php
    error_reporting(0);

    echo "<b>Week no :".$f1."</b>";
       ?>
    </div>
     <div class="column">
     <label for="status"><b>Status completed</b></label>
    <input type="text" name="status" placeholder="Status completed" />
    </div>
  </div>
  <div class="row">
    <div class="column">
      <label for="actname"><b>Activity name</b></label>
      <!-- <input type="text" name="actname" placeholder="Activity name" /> -->
      <select name="actname" style="width: 400px;">
      <option selected disabled hidden>Choose here</option>
      <option value="Project Synopsis Submission">Project Synopsis Submission</option>
      <option value="Project Review-1">Project Review-1</option>
      <option value="Project Review-2">Project Review-2</option>
      <option value="Submission of Project Report Phase-1">Submission of Project Report Phase-1</option>
    </select>
    <br><br>
    </div>
    <div class="column">
      <label for="deadline"><b>Deadline</b></label>
      <input type="date" name="deadline" placeholder="Deadline" />
    </div>
  </div>
  <div class="row">
    <div class="column">
      <label for="marks"><b>marks</b></label>
      <input type="text" name="marks" placeholder="marks"/>

    </div>
    <div class="column">
      <label for="follow"><b>Followed or not</b></label>
      <!-- <input type="text" name="follow" placeholder="Followed or not"/> -->
      <select name="follow" style="width: 400px;">
      <option selected disabled hidden>Choose here</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
    <br><br>

    </div>
  </div>
  </div>

  <button type="submit" value="Save" class="registerbtn" name="login">Submit</button>
</form>
</form>
</body>
</html>
