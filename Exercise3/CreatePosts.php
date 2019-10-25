<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dawsonfrick84", "oathu4Ai", "dawsonfrick84");
$user=$_POST["user"];
$mypost=$_POST["mypost"];
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s<br>", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users ORDER by user_id";
$write=FALSE;

if ($result = $mysqli->query($query)) {
  printf("Users Connection success<br>Passed in user id: %s<br>", $user);
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        if ($row["user_id"]==$user){
          $write=TRUE;
        }
        //echo "id: " . $row["user_id"]. " <br>"; //show all users
    }
    if ($write==FALSE){
      printf("User does not exist<br>");
    }
    $result->free();
}

$query = "SELECT post_id, content, author_id FROM Posts ORDER by post_id";

if ($result = $mysqli->query($query) && $write==TRUE) {
  printf("Posts Connection success<br>Passed in user id: %s<br>", $user);
  $sql = "INSERT INTO Posts (content, author_id) VALUES ('$mypost', '$user')";
    if ($mysqli->query($sql) === TRUE) {
      printf("Post created successfully<br>");
    }
    else {
      printf("Error: " . $sql . "<br>" . $conn->error);
    }

    $result->free();
}


/* close connection */
$mysqli->close();
?>
