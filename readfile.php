
<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


const FILENAME_RF = "files/readfilename";

$f = fopen(FILENAME_RF, "r");

$filename = trim(fgets($f)); // attention to the end line character !!
$fn = explode('/',$filename)[1];
// echo  "<b>File: ".$fn."</b>";


// TODO get the extension of this file and chose to:
//    - .pdf : open is as pdf
//    - .jpg .jpeg .png : open it as an image
//    -  doc*, xls*, ppt*, etc : guide the user to download it
//    -  else: open it as a text file in the browser


$content = file("$filename");
// var_dump($content);
// if ($content) {

  echo "<pre>";
  foreach ($content as $l) {
    echo $l;
  }
  echo "</pre>";
// }

?>