<?php
 error_reporting(0);
$servername="localhost";
$username="root";
$password="";
$dbname="final";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
$sql="select * from marks where actname='Project Review-1'";
$records=mysqli_query($conn,$sql);
$sql1="select * from marks where actname='Project Review-2'";
$records1=mysqli_query($conn,$sql1);

}
else {
  //echo "Connection Failed";
}
// if(isset($_POST["view"]))
// {
//   header('location: http://localhost/befcoview.html');
// }
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


      <!-- <a href="search6.php">Search</a> -->
      <div class="topnav-right" id="myTopnav">
        <a href="cordin1.php">Back</a>
      <a href="logout.php" onclick='return confirm("Do you want to Logout?");'>Logout</a>
  </div>

  </div>
<h2 align="center">Department of Information Technology</h2>
<hr>

<form name="Regform" action="" method="post" autocomplete="off" >
<table width=100%>
  <caption><h2>Project Review 1</h2></caption>

  <colgroup span="4"></colgroup>
  <thead>
    <tr>
      <th scope="col"><b>Roll no</b></th>
      <th scope="col" ><b>Review 1</b></th>
      <th scope="col" ><b>Follwed or no</b></th>
    </tr>
  </thead>
  <tbody>
    <?php
     error_reporting(0);

     // if(mysqli_num_rows($res) > 0)
     // {
          while($row=mysqli_fetch_array($records))
          {
            echo "<tr>";
              echo "<td scope=\"row\">".$row["rollm"]."</td>";
              echo "<td scope=\"row\">".$row["actname"]."</td>";
              echo "<td scope=\"row\">".$row["follow"]."</td>";
              echo "</tr>";
          }
  //      }
        // else {
        //   echo "<tr>";
        //     echo "<td scope=\"row\">"."None"."</td>";
        //     echo "<td scope=\"row\">"."None"."</td>";
        //     echo "<td scope=\"row\">"."None"."</td>";
        //     echo "</tr>";
        // }

    ?>

</tbody>
</table><br><br><br>
<table width=100%>
  <caption><h2>Project Review 2</h2></caption>

  <colgroup span="4"></colgroup>
  <thead>
    <tr>
      <th scope="col"><b>Roll no</b></th>
      <th scope="col" ><b>Review 2</b></th>
      <th scope="col" ><b>Follwed or no</b></th>
    </tr>
  </thead>
  <tbody>
    <?php
     error_reporting(0);


     // if(mysqli_num_rows($res) > 0)
     // {
          while($row1=mysqli_fetch_array($records1))
          {
            echo "<tr>";
              echo "<td scope=\"row\">".$row1["rollm"]."</td>";
              echo "<td scope=\"row\">".$row1["actname"]."</td>";
              echo "<td scope=\"row\">".$row1["follow"]."</td>";
              echo "</tr>";
          }
        //}
        // else {
        //   echo "<tr>";
        //     echo "<td scope=\"row\">"."None"."</td>";
        //     echo "<td scope=\"row\">"."None"."</td>";
        //     echo "<td scope=\"row\">"."None"."</td>";
        //     echo "</tr>";
        // }


    ?>

</tbody>
</table>
</form>
</body>
</html>
