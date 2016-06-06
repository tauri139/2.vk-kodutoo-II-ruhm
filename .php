<?php
  /*$file_name = "data.txt";
  $entries_from_file = file_get_contents($file_name);

  //massiic olemasolevate purkidega
  $entries = json_decode($entries_from_file);*/

  if(isset($_GET["id"]) && isset($_GET["title"]) && isset($_GET["ingredients"]) && !empty($_GET["id"]) && !empty($_GET["title"]) && !empty($_GET["ingredients"])){
    //salvestan juurde
    $object = new StdClass();
    $object->id = $_GET["id"];
    $object->title = $_GET["title"];
    $object->ingredients = $_GET["ingredients"];

    //lisan massiivi juurde
  /*  array_push($entries, $object);

    //teen stringiks
    $json = json_encode($entries);

    file_put_contents($file_name, $json);*/

    $servername = "localhost";
    $username = "if14";
    $password = "ifikas2014";
    $dbname = "if14_taurik_app";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO planner (id, title, content, due_date)
    VALUES ('$object->id', '$object->title', '$object->ingredients', '2016-06-05')";

    if ($conn->query($sql) === TRUE) {
       echo "New record created successfully";
    } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $sql2 = "SELECT id, title, content FROM planner";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["content"]. "<br>";
      }
    } else {
      echo "0 results";
    }

    $conn->close();

  }

/* EI TÖÖTA
 if(isset($_GET["delete"]) && !emtpy($_GET["delete"])){
    function in_array_r($id, $title, $ingredients = false) {
    foreach ($id as $item) {
        if (($strict ? $item === $_GET["delete"] : $item == $id) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

      return false;
    }
  }
  */

  /*echo(json_encode($entries));*/


?>
