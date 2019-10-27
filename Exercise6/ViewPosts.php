<html>
<head>
   <title>View User Posts</title>
</head>
<h1>View User Posts</h1>
<form action="ViewUserPosts.php" method="post">
<select name="user">
<option value="">Show All Posts</option>
<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dawsonfrick84", "oathu4Ai", "dawsonfrick84");
$query = "SELECT user_id FROM Users ORDER by user_id";
if ($result = $mysqli->query($query)) {
  while ($row = $result->fetch_assoc()) {
  echo " <option value='". $row['user_id'] ."'> ". $row['user_id'] ." </option> ";
  }
}
?>
</select>
<input type="submit" value="Submit">
</html>
