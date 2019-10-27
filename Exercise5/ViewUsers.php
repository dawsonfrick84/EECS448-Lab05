<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dawsonfrick84", "oathu4Ai", "dawsonfrick84");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s<br>", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users ORDER by user_id";
$write=true;

if ($result = $mysqli->query($query)) {
  echo"<html>
  <head>
    <title>View Users</title>
  <head>
  <h1>View Users</h1>
  <style>
     table, th, td {
       border: 1px solid black;
       padding: 2px;
       border-collapse: collapse;
     }
  </style>
  <table><tr><th>&nbsp&nbsp&nbsp</th><th align='center'>User ID</th></tr>";
    $rownum=1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $rownum . "</td> <td>" . $row["user_id"] . " </td></tr>"; //show all users
        $rownum=$rownum+1;
    }
    echo"</table>";
    $result->free();
}
$mysqli->close();
echo"</html>";
?>
