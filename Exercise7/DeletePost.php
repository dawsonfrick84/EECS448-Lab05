<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dawsonfrick84", "oathu4Ai", "dawsonfrick84");
$user=$_POST["user"];

  if ($mysqli->connect_errno) {
      printf("Connect failed: %s<br>", $mysqli->connect_error);
      exit();
  }

  $query = "SELECT post_id, content, author_id FROM Posts ORDER by post_id";

  if ($result = $mysqli->query($query)) {
    echo"<html>
    <head>
      <title>Delete Posts</title>
    <head>
    <h1>Delete Posts</h1>
    <style>
       table, th, td {
         border: 1px solid black;
         padding: 2px;
         border-collapse: collapse;
       }
    </style>
    <form action='DeletePost2.php' method='post'>
    <table><tr><th align='center'>Delete?</th><th align='center'>Post ID</th><th align='center'>User ID</th><th align='center' width='750px'>Post Content</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td><input type='checkbox' name='check[" . $row["post_id"]. " ]' value='" . $row["post_id"]. " '></td>";
        echo "<td>" . $row["post_id"]. " </td>"; //show post id
        echo "<td>" . $row["author_id"]. " </td>"; //show user
        echo "<td width='750px'>" . $row["content"]. "</td></tr>"; //show post
    }
    echo"<tr><td height='60px' align='center'><input type='submit' value='Submit'></td></tr></form>";
      $result->free();
  }
  $mysqli->close();
?>
