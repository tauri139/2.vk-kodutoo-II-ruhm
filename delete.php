<?php
  $file_name = "data.txt";
  $entries_from_file = file_get_contents($file_name);

  //massiiv olemasolevate ülesannetega
  $entries = json_decode($entries_from_file);

  $tasks = count($entries);

  for ($i = 0; $i < $tasks; $i++){
    if ($entries[$i]->id == $_GET["delete_id"]){
      array_splice($entries, $i, 1);
      //unset($entries[$i]);
      break;
    }
  }

  $json = json_encode($entries);

  file_put_contents($file_name, $json);

  echo(json_encode($entries));

?>
