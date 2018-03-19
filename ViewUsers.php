<!--
I used this source as reference for my code to print out the table values:
http://www.dummies.com/programming/sql/how-to-use-html5-tables-for-sql-output/
-->
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "a268s950", "iH3Aeh4w", "a268s950");

$query = "SELECT * FROM Users"; //You don't need a ; like you do in SQL
$result = $mysqli->query($query);

echo '<table border="1">'; // start a table tag in the HTML
echo '<tr><th>user_id</th></tr>';
while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
echo "<tr><td>" . $row['user_id'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

$mysqli->close();//sql close connection

?>
