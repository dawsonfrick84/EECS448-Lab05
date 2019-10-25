<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dawsonfrick84", "oathu4Ai", "dawsonfrick84");
$user=$_POST["user"];
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s<br>", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users ORDER by user_id";
$write=true;

if ($result = $mysqli->query($query)) {
  printf("Connection success<br>Passed in user id: %s<br>", $user);
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        if ($row["user_id"]==$user){
          $write=false;
        }
        // echo "id: " . $row["user_id"]. " <br>"; //show all users
    }
    if ($write==TRUE){
      printf("Adding user to database...<br>");
      $sql = "INSERT INTO Users (user_id) VALUES ('$user')";

      if ($mysqli->query($sql) === TRUE) {
        printf("User created successfully<br>");
      }
      else {
        printf("Error: " . $sql . "<br>" . $conn->error);
      }
    }
    else {
      printf("User already exists!");
    }


    /* free result set */
    $result->free();
}


/* close connection */
$mysqli->close();
?>
