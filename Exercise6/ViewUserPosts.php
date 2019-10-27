<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dawsonfrick84", "oathu4Ai", "dawsonfrick84");
$user=$_POST["user"];
if($user!=""){
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s<br>", $mysqli->connect_error);
      exit();
  }

  $query = "SELECT post_id, content, author_id FROM Posts ORDER by post_id";

  if ($result = $mysqli->query($query)) {
    echo"<html>
    <head>
      <title>View $user's posts</title>
    <head>
    <h1>View $user's posts</h1>
    <style>
       table, th, td {
         border: 1px solid black;
         padding: 2px;
         border-collapse: collapse;
       }

    </style>
    <table><tr><th align='center'>Post ID</th><th align='center'>User ID</th><th align='center' width='750px'>Post Content</th></tr>";
    while ($row = $result->fetch_assoc()) {
      if($row["author_id"]==$user){
          echo "<tr><td>" . $row["post_id"]. " </td>"; //show post id
          echo "<td>" . $row["author_id"]. " </td>"; //show user
          echo "<td width='750px'>" . $row["content"]. "</td></tr>"; //show post
        }
    }

      $result->free();
  }
  $mysqli->close();
}

else{
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s<br>", $mysqli->connect_error);
      exit();
  }

  $query = "SELECT post_id, content, author_id FROM Posts ORDER by post_id";

  if ($result = $mysqli->query($query)) {
    echo"<html>
    <head>
      <title>View All Posts</title>
    <head>
    <h1>View All Posts</h1>
    <style>
       table, th, td {
         border: 1px solid black;
         padding: 2px;
         border-collapse: collapse;
       }

    </style>
    <table><tr><th align='center'>Post ID</th><th align='center'>User ID</th><th align='center' width='750px'>Post Content</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["post_id"]. " </td>"; //show post id
        echo "<td>" . $row["author_id"]. " </td>"; //show user
        echo "<td width='750px'>" . $row["content"]. "</td></tr>"; //show post
    }

      $result->free();
  }
  $mysqli->close();
}
?>
