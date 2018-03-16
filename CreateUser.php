<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);



$mysqli = new mysqli("mysql.eecs.ku.edu", "a268s950", "iH3Aeh4w", "a268s950");

 //check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$username = $_POST['username'];
if($username!="")
{

  $query = "SELECT user_id FROM Users WHERE user_id='$username'"; //sets the string for the query
  $result = "";
  if ($result = $mysqli->query($query) )  //sets result equal to the result of the query which looks at all the user_ids in the Users table and checks to see if any equal username
  {

    //fetch associative array
    //$row = $result->fetch_assoc();
    //echo "<p>The Row username is :" . $row["user_id"] . ":</p>";
    $row = "";
    $rowUserName = "";
    while ($row = $result->fetch_assoc()) { //while loop runs while fetch result gives you something
        echo "<p>The Row username is: " . $row["user_id"] . "</p>";
        $rowUserName = $row["user_id"];
    }
    //echo "$rowUserName hi ".$row["user_id"]." paul";



    if($rowUserName == $username )
      echo "<p>The user already exists</p>";
    else
    {
      $query = "INSERT INTO Users (user_id) VALUES ('$username')";
      if($result = $mysqli->query($query))//checks to see if the query suceeded in inserting to the table
        echo "<p>User was added!</p>";
      else
        echo "<p>User was not added because the query failed <p>";
    }

    // free result set
  }
}
else {
  echo "<p>You entered an empty string. （╯°□°）╯︵ ┻━┻</p>";
}
//close connection
$mysqli->close();

?>
