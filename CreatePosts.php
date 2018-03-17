<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$username = "";
$content = "";
$result = "";
$username = $_POST['username'];
$content = $_POST['content'];

$mysqli = new mysqli("mysql.eecs.ku.edu", "a268s950", "iH3Aeh4w", "a268s950");
$query = "SELECT user_id FROM Users WHERE user_id='$username'";

if($username == "" || $content == "")
{
   echo "Empty field submitted.";
}
elseif($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}
elseif($username != "" || $content != "")
{

  if ($result = $mysqli->query($query))
  {
    $row = "";
    $rowUserName = "";
    while ($row = $result->fetch_assoc())
    { //while loop runs while fetch result gives you something
      echo "<p>The Row username is: " . $row["user_id"] . "</p>";
      $rowUserName = $row["user_id"];
    }
    if($rowUserName == $username )
    {
      //todo add the post
      $query1 = "INSERT INTO Posts (author_id, content) VALUES ('$username', '$content')";
      if($result = $mysqli->query($query1))//checks to see if the query suceeded in inserting to the table
        echo "<p>The user already exists, so the post was added!</p>";
      else
        echo "<p>Post was not added because the query failed <p>";
    }
    else
    {
      echo "<p>Post was not added because the User did not exist.<p>";
    }
  }
}
else {
  echo "You broke it, bad user.";
}

$mysqli->close();//sql close connection
?>
