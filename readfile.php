
<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


const FILENAME_RF = "files/readfilename";

$f = fopen(FILENAME_RF, "r");
$filename = fgets($f);

$content = file($filename);

echo "<pre>";
foreach ($content as $l) {
  echo $l;
}
echo "</pre>"
?>