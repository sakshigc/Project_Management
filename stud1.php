<?php
$servername="localhost";
$username="root";
$password="";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{

session_start();
$r1=$_SESSION['r1'];

if(isset($_POST["login"]))
{
    if(mysqli_query($conn,"select * from guide where rolln1='$r1'"))
    {

      $sql1="INSERT INTO guideact (rolla, week, status) VALUES ('$r1','$_POST[weekno]','$_POST[status]')";
      if(mysqli_query($conn,$sql1))
      {

        $sql2="INSERT INTO marks (rollm, actname, marks,follow,deadline) VALUES ('$r1','$_POST[actname]','$_POST[marks]','$_POST[follow]','$_POST[deadline]')";
        if(mysqli_query($conn,$sql2))
        {
            echo "<script type='text/javascript'>alert('Data updated');</script>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('Data not inserted');</script>";
        }
      }
    }
    else
    {
      echo "<script type='text/javascript'>alert('SORRY!! This rollno not Assigned to you');</script>";


      }
  }
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
  th, td {
    padding: 5px;
    text-align: left;
  }

  .top
  {
    background-color: black;
    opacity: .8;
    overflow: hidden;;

  }
  .top a
  {
    float: left;
    color: white;
    text-align: center;
    padding: 30px 30px;
    font-size: 15px;
  }
  .top a:hover
  {
    background-color: green;
    color: white;

  }
  .top a.active
  {
    background-color: black;
    opacity: .8;
    color: white;
  }
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
    background-color: #333;
  }

  .topnav a {
    float: left;
    display: block;
    color: green;
    text-align: center;
    padding: 50% 30%;
    text-decoration: none;
    font-size: 17px;
  }

  .topnav .icon {
    display: none;
  }


  .topnav a:hover, {
    background-color: green;
    color: black;
  }


  @media screen and (max-width: 600px) {
    .topnav a:not(:first-child) {
      display: none;
    }
    .topnav a.icon {
      float: right;
      display: block;
    }
  }

  @media screen and (max-width: 600px) {
    .topnav.responsive {position: relative;}
    .topnav.responsive .icon {
      position: absolute;
      right: 0;
      top: 0;
    }
    .topnav.responsive a {
      float: center;
      display: block;
      text-align: left;
    }
    .topnav.responsive .dropdown {float: none;}
    .topnav.responsive .dropdown-content {position: relative;}
    .topnav.responsive .dropdown .dropbtn {
      display: block;
      width: 100%;
      text-align: left;
    }
  }
  .topnav {

    overflow: hidden;
    background-color: black;
  }

  .topnav a {

    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  .topnav a:hover {
    background-color:  #4CAF50;
    color: black;
  }

  .topnav a.active {
    background-color: #4CAF50;
    color: white;
  }

  .topnav-right {
    float: right;
  }
  </style>
</head>
<body>
<!-- ----------------------------------------------- -->

<div class="topnav">
  <a href="#"><b><font size="15">ProManager</font><b></a>
<div class="topnav-right" id="myTopnav">
  <a href="grp1.php">Group 1</a>
    <a href="grp2.php">Group 2</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
<!-- --------------------------------------------------------------- -->

    <!-- <a class="active" id="a"href="grp1.php"><strong>Group1    </strong></a>
    <a class="active" href="grp2.php"><strong>Group2     </strong></a> -->

<?php
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
      <th scope="col"><b>Students name</b></th>
      <th scope="col" ><b>Guide</b></th>
      <th scope="col" ><b>Project Topic</b></th>
    </tr>
  </thead>
  <tbody>
    <?php
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
<thead>
  <tr>
    <th scope="col">Week no</th>
    <th scope="col" colspan="4">Activity Complete</th>
  </tr>
</thead>
<tbody>

    <?php
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
</table>
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
<form name="Regform" action="grp1.php" method="post" autocomplete="off" >
   <div class ="border">
  <div  class ="container">
  <h1>Activity Upadation</h1>


  </div>


  <div class="row">
    <div class="column">
      <label for="week no"><b>week no</b></label>
      <input type="text" name="weekno" placeholder="week no" />
      <?php
      $sql1="select * from week where rolla='$r1'";
      $records1=mysqli_query($conn,$sql1);

      while($row1=mysqli_fetch_array($records1)){$f1=$row1["week"];}
      echo "week :".$f1;

       ?>
    </div>
  </div>
  <div class="row">
    <div class="column">
      <label for="actname"><b>Activity name</b></label>
      <input type="text" name="actname" placeholder="Activity name" />
    </div>
  </div>
  <div class="row">  </div>

  <button type="submit" value="Save" class="registerbtn" name="login">Submit</button>
</form>
</form>
</body>
</html>
