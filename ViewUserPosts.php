<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  $selected_val = "Anna";
  $selected_val = $_POST['myList'];  // Storing Selected Value In Variable
  echo "You have selected: " . $selected_val;  // Displaying Selected Value

  $mysqli = new mysqli("mysql.eecs.ku.edu", "a268s950", "iH3Aeh4w", "a268s950");

  $query = "SELECT content FROM Posts WHERE author_id='$selected_val'"; //You don't need a ; like you do in SQL
  $result = $mysqli->query($query);

  echo '<table border="1">'; // start a table tag in the HTML
  echo '<tr><th> '. $selected_val . '</th></tr>';
  while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
    echo "<tr><td>" . $row['content'] . "</td></tr>";  //$row['index'] the index here is a field name
  }
  echo "</table>"; //Close the table in HTML

  $mysqli->close();//sql close connection

?>
