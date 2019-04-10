<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
 <title>Table with database</title>
 <style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #33C4FF  ;
   font-family: monospace;
   font-size: 35px;
   text-align: left;
     } 
  th {
   background-color: #33C4FF  ;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
 <table>
 <tr>
  <th>Id</th> 
  <th>Username</th> 
  <th>Email</th>
  <th>Department</th>
  <th>Password</th>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "userloginsystem");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT id, username, password, email, dept FROM users";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"] . "</td><td>"
. $row["email"]. "</td><td>"
. $row["dept"]. "</td><td>"
. $row["password"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
 <div align="center">
<a style=" margin-top:25px" href="update.php" class="btn btn-primary">UPDATE MY INFORMATION</a>
 </div>
</body>
</html>