<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dawsonfrick84", "oathu4Ai", "dawsonfrick84");
$user=$_POST["user"];
$mypost=$_POST["mypost"];
if($user!=""&&$mypost!=""){

  if ($mysqli->connect_errno) {
      printf("Connect failed: %s<br>", $mysqli->connect_error);
      echo"<br><a href='../Exercise3/CreatePosts.html'>Return to Create Posts</a><br>";
      echo"<a href='../Exercise2/CreateUser.html'>Go to Create User</a><br>";
      echo"<a href='../Exercise6/ViewPosts.php'>Go to View Posts</a></html>";
      exit();
  }

  $query = "SELECT user_id FROM Users ORDER by user_id";
  $write=FALSE;

  if ($result = $mysqli->query($query)) {
    printf("Users Connection success<br>Passed in user id: %s<br>", $user);

      while ($row = $result->fetch_assoc()) {
          if ($row["user_id"]==$user){
            $write=TRUE;
          }
      }
      if ($write==FALSE){
        printf("User does not exist<br>");
        echo"<br><a href='../Exercise3/CreatePosts.html'>Return to Create Posts</a><br>";
        echo"<a href='../Exercise2/CreateUser.html'>Go to Create User</a><br>";
        echo"<a href='../Exercise6/ViewPosts.php'>Go to View Posts</a></html>";
      }
      $result->free();
  }

  $query = "SELECT post_id, content, author_id FROM Posts ORDER by post_id";

  if ($result = $mysqli->query($query) && $write==TRUE) {
    printf("Posts Connection success<br>Passed in post: %s<br>", $mypost);
    $sql = "INSERT INTO Posts (content, author_id) VALUES ('$mypost', '$user')";
      if ($mysqli->query($sql) === TRUE) {
        echo"Post created successfully<br>";
        echo"<br><a href='../Exercise3/CreatePosts.html'>Return to Create Posts</a><br>";
        echo"<a href='../Exercise2/CreateUser.html'>Go to Create User</a><br>";
        echo"<a href='../Exercise6/ViewPosts.php'>Go to View Posts</a></html>";
      }
      else {
        printf("Error: " . $sql . "<br>" . $conn->error);
        echo"<br><a href='../Exercise3/CreatePosts.html'>Return to Create Posts</a><br>";
        echo"<a href='../Exercise2/CreateUser.html'>Go to Create User</a><br>";
        echo"<a href='../Exercise6/ViewPosts.php'>Go to View Posts</a></html>";
      }

      $result->free();
  }
  $mysqli->close();
  }
else{
  echo "User ID/Post content cannot be blank<br>";
  echo"<br><a href='../Exercise3/CreatePosts.html'>Return to Create Posts</a><br>";
  echo"<a href='../Exercise2/CreateUser.html'>Go to Create User</a><br>";
  echo"<a href='../Exercise6/ViewPosts.php'>Go to View Posts</a></html>";
}


?>
