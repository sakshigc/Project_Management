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
$r2=$_SESSION['r2'];

  if(isset($_POST['submit1']))
  {
    $sql="select * from guideact where rolla=$r1";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($res))
    {

      $f1=$row['week'];
      //echo "$f1";
    }

    if($f1!="12")
    {
      //echo $f1;
      echo "<script type='text/javascript'>alert('12 Weeks not completed');</script>";
    }
    else
    {
      $sql="select * from guideact inner join studact on guideact.rolla=studact.rolla inner join marks on marks.rollm=guideact.rolla where guideact.rolla=$r1";
      $res=mysqli_query($conn,$sql);
      while($roew=mysqli_fetch_array($res))
      {
      $sql1="delete from guideact where rolla='$r1'";
      if(mysqli_query($conn,$sql1))
      {

          $sql2="delete from studact where rolla='$r1'";
          if(mysqli_query($conn,$sql2))
          {
            $sql3="delete from marks where rollm='$r1'";
            if(mysqli_query($conn,$sql3))
            {
              $sql4="delete from week where rolla='$r1'";
              if(mysqli_query($conn,$sql4))
              {

              echo "<script type='text/javascript'>alert('Activity Removed');</script>";
              }
            }
          }
        }
        else
        {
          echo "not deleted";
        }

    }
  }
}

if(isset($_POST["submit2"]))
{
  $sql="select * from guideact where rolla=$r2";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($res))
  {
    $f1=$row['week'];
  }
  if($f1!="12")
  {
    echo "<script type='text/javascript'>alert('12 Weeks not completed');</script>";
  }
  else
  {
  $sql="select * from guideact inner join studact on guideact.rolla=studact.rolla inner join marks on marks.rollm=guideact.rolla where guideact.rolla=$r2";
  $res=mysqli_query($conn,$sql);
  while($roew=mysqli_fetch_array($res))
  {
  $sql1="delete from guideact where rolla='$r2'";
  if(mysqli_query($conn,$sql1))
  {

      $sql2="delete from studact where rolla='$r2'";
      if(mysqli_query($conn,$sql2))
      {
        $sql3="delete from marks where rollm='$r2'";
        if(mysqli_query($conn,$sql3))
        {
          $sql4="delete from week where rolla='$r2'";
          if(mysqli_query($conn,$sql4))
          {

          echo "<script type='text/javascript'>alert('Activity Removed');</script>";
          }
        }
      }
    }
    else
    {
      echo "not deleted";
    }
}
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
  .inn input[type="checkbox"],input[type="submit"] {
    display: inline;
}
.tabb
{
  margin-top: 10%;
}
 input[type=submit] {
  background-color:black;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
  </style>
</head>
<body>


<div class="topnav">
  <a href="#"><b><font size="15">ProManager</font><b></a>
<div class="topnav-right" id="myTopnav">
  <a href="g1.php">Group 1</a>
    <a href="grp2.php">Group 2</a>
    <a href="logout.php" id="logout" onclick='return confirm("Do you want to logout?");'>Logout</a>
  </div>
</div>

<table width=100% class="tabb">
<caption><h1>Assigned Groups</h1></caption>
  <colgroup span="3"></colgroup>
  <thead>
    <tr>
      <th scope="col"><b>Rollno</b></th>
      <th scope="col"><b>Project name</b></th>
      <th scope="col"><b>Submitted</b></th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
    error_reporting(0);
    $sql="select * from student where rolln='$r1'";
      $records=mysqli_query($conn,$sql);

      $row=mysqli_fetch_array($records);?>
      <td scope="row"><?php  error_reporting(0); echo $r1; ?></td>
      <td scope="row"><?php  error_reporting(0); echo $row["pname"];?> </td>
      <td scope="row">
        <form action="gview.php" method="post">
          <input type="submit" value="done" name="submit1">
        </form>
      </td>
    </tr>
    <tr>
    <?php
error_reporting(0);
     $sql1="select * from student where rolln='$r2'";
      $records1=mysqli_query($conn,$sql1);

      $row1=mysqli_fetch_array($records1);
      //$pro=$row1['pname'];
      ?>
    <td scope="row"><?php  error_reporting(0); echo $r2; ?></td>
    <td scope="row"><?php   error_reporting(0); echo $row1['pname'];?> </td>
    <td scope="row">
      <form action="gview.php"  method="post">
      <span> <input type="submit" value="done" name="submit2"></span>
      </form>
    </td>
    </tr>
  </tbody>
</table>

</body>
</html>
