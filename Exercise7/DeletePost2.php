<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dawsonfrick84", "oathu4Ai", "dawsonfrick84");
$user=$_POST["user"];

  if ($mysqli->connect_errno) {
      printf("Connect failed: %s<br>", $mysqli->connect_error);
      exit();
  }

  $query = "SELECT post_id, content, author_id FROM Posts ORDER by post_id";

  if ($result = $mysqli->query($query)) {
      foreach($_POST['check'] as $value)
      {
         $sql="DELETE FROM Posts WHERE post_id=$value";
         if ($mysqli->query($sql) === TRUE) {
           echo "Deleted post with id ". $value . "<br>";
         }
         else{
           echo "Error deleting id ".$value." ";
         }
      }

      $result->free();
  }
  $mysqli->close();

  echo"<br><a href='../Exercise4/AdminHome.html'>Return to Admin Home</a><br>";
  echo"<a href='../Exercise7/DeletePost.php'>Return to Delete User</a><br>";

?>
