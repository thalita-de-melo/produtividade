<?php
  $servername = "localhost"; //localhost
  $username = "u264392954_thalita"; //root
  $password = "Admin2022"; 
  $dbname = "u264392954_produtividade"; //produtividade

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM escolas";
  $result = $conn->query($sql);

/*
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Name: " . $row["nome"]. " " . $row["senha"]. "<br>";
    }
  } else {
    echo "0 results";
  } */

?>