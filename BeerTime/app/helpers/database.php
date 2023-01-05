<?php
  function dbQuerySelect($query) {
    $servername = "localhost"; $username = "root"; $password = "root"; $dbname = "wb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
    $result = $conn->query($query);
    $return = [];
    while($row = $result->fetch_assoc()) { array_push($return, $row); }
    $conn->close();
    return $return;
  }

  function dbQueryUpdate($query) {
    $servername = "localhost"; $username = "root"; $password = "root"; $dbname = "wb";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
    if ($conn->query($query) === TRUE) {
      $conn->close();
      return true;
    } else {
      $conn->close();
      return false;
    }
    // $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
  }
?>
