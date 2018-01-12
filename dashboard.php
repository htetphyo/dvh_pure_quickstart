<?php

// Read JSON file
$filepath = "json_set/dashboard.json";
if (! file_exists($filepath) ) {
  die("Cann't find Json file");

}  

$json = file_get_contents($filepath);
//Decode JSON
$json_data = json_decode($json,true);

//Print data
print_r($json_data);

?>