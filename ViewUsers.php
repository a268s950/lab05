<!--
I used this source as reference for my code to print out the table values:
http://www.dummies.com/programming/sql/how-to-use-html5-tables-for-sql-output/
-->
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "a268s950", "iH3Aeh4w", "a268s950");

$query = "SELECT user_id FROM Users";
printf("<table>");

if($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}
elseif($result = $mysqli->query($query))
{
    if($row = $result->fetch_assoc())
    {
      printf("<tr>");
      foreach($row as $field => $value)
      {
        printf("<th>$field</th>");
      }
      printf("</tr>");
      //second query gets the data
      $data = $mysqli->query($query);
      foreach($data as $row){
      printf("<tr>");
      foreach ($row as $name=>$value)
      {
        printf("<td>$value</td>");
      } // end field loop
      printf("</tr>");
    } // end record loop
  }
}
else
{
  echo "You broke it, bad user.";
}
printf("</table>");


$mysqli->close();//sql close connection
?>
