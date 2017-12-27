<?php

$array_data = [];
$file = fopen('../data/partnerDataGPSEN.csv', 'r');
if(!$file) {
     echo '<h1>Error, File wasn\'t Found...</h1>';
     exit;
}
do {
     $line = fgetcsv($file);
     if(!$line) {
          break;
     }
     $array_data[] = $line;
} while($line);
echo json_encode($array_data);

?>