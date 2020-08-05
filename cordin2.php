<?php
$servername="localhost";
$username="root";
$password="";
$dbname="main1";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
$sql="select * from student";
$records=mysqli_query($conn,$sql);
}
else {
  echo "Connection Failed";
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
.act
{
  float:right;
}
</style>
</head>
<body>
  <div class="topnav">
    <a href="#"><b><font size="15">ProManager</font><b></a>
      <div class="act">
      <a href="befcoview.html">View Activity</a>
    </div>
  </div>
<h2>PVG College of Engineering and Technology, Pune
Department of Information Technology</h2>

<form name="Regform" action="" method="post" autocomplete="off" >
<table width=100%>
  <caption><b>Project Groups</b></caption>
  <col>
  <col>
  <colgroup span="4"></colgroup>
  <thead>
    <tr>
      <th scope="col"><b>Group no</b></th>
      <th scope="col" ><b>Name of student</b></th>
      <th scope="col" ><b>Domain</b></th>
      <th scope="col" ><b>Name of guide</b></th>
      <th scope="col" ><b>Project title</b></th>
      <th scope="col" ><b>Sponsored company name</b></th>
    </tr>
  </thead>
  <tbody>
    <?php


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
</form>
</body>
</html>
