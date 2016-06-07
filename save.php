<?php
  $file_name = "data.txt";
  $entries_from_file = file_get_contents($file_name);

  //massiiv olemasolevate ülesannetega
  $entries = json_decode($entries_from_file);

  if(isset($_GET["due_date"]) && isset($_GET["id"]) && isset($_GET["title"]) && isset($_GET["task"]) && !empty($_GET["id"]) && !empty($_GET["title"]) && !empty($_GET["task"])){
    //salvestan juurde
    $object = new StdClass();
    $object->id = $_GET["id"];
    $object->title = $_GET["title"];
    $object->task = $_GET["task"];
    $object->due_date = $_GET["due_date"];

    //lisan massiivi juurde
    array_push($entries, $object);

    //teen stringiks
    $json = json_encode($entries);

    file_put_contents($file_name, $json);



  }

/* EI TÖÖTA
 if(isset($_GET["delete"]) && !emtpy($_GET["delete"])){
    function in_array_r($id, $title, $task = false) {
    foreach ($id as $item) {
        if (($strict ? $item === $_GET["delete"] : $item == $id) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

      return false;
    }
  }
  */

  echo(json_encode($entries));

?>
