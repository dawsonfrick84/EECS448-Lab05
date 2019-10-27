<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dawsonfrick84", "oathu4Ai", "dawsonfrick84");
$user=$_POST["user"];
if($user!=""){
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s<br>", $mysqli->connect_error);
      exit();
  }

  $query = "SELECT user_id FROM Users ORDER by user_id";
  $write=true;

  if ($result = $mysqli->query($query)) {
    printf("Connection success<br>Passed in user id: %s<br>", $user);
      while ($row = $result->fetch_assoc()) {
          if ($row["user_id"]==$user){
            $write=false;
          }
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


      $result->free();
  }



  $mysqli->close();
  }
else{
  echo "User ID Cannot Be Blank<br>";
}
echo"<br><a href='../Exercise2/CreateUser.html'>Return to Create User</a><br>";
echo"<a href='../Exercise3/CreatePosts.html'>Go to Create Posts</a><br>";
echo"<a href='../Exercise4/AdminHome.html'>Go to Admin Page</a>";
?>
