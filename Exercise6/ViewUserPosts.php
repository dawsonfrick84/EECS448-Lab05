<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dawsonfrick84", "oathu4Ai", "dawsonfrick84");
$user=$_POST["user"];
$mypost=$_POST["mypost"];

if ($mysqli->connect_errno) {
    printf("Connect failed: %s<br>", $mysqli->connect_error);
    exit();
}

$query = "SELECT post_id, content, author_id FROM Posts ORDER by post_id";

if ($result = $mysqli->query($query)) {
  printf("Posts Connection success<br>Passed in user id: %s<br>", $user);
  $sql = "INSERT INTO Posts (content, author_id) VALUES ('$mypost', '$user')";
  while ($row = $result->fetch_assoc()) {
      echo "post id: " . $row["post_id"]. " <br>"; //show post id
      echo "author id: " . $row["author_id"]. " <br>"; //show user
      echo "post content: " . $row["content"]. " <br>"; //show post
  }

    $result->free();
}


$mysqli->close();
?>
