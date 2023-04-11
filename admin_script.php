<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$targer_dir = "uploads";
const FILENAME_UF = "files/files";
const FILENAME_LOG = "files/logs";

if (isset($_POST['upload'])) {

  if (isset($_FILES) && count($_FILES) > 0) {
      /*
        moving all the selected files to the server
        writng their names to the files/files and the log file
      */

    foreach ($_FILES as $f) {
      $file_name = trim($f['name']);
      if(strlen($file_name) > 1) {
        $file_tmp_name = $f['tmp_name'];
        $file_name_target = "$targer_dir/$file_name";
        if(move_uploaded_file($file_tmp_name, $file_name_target)) {
          $fup = fopen(FILENAME_UF, 'a');
          $flog = fopen(FILENAME_LOG, 'a');
          if($fup) {
            fwrite($fup, $file_name."\n");
            fclose($fup);
            if($flog) { // writing it in the log file
              fwrite($flog, date('Y-m-i').",".date('H:i:s').",".$file_name."\n");
              fclose($flog);
            }
          }
        }



      }
    }
  }

}

if (isset($_POST['clean'])) {

  if(!system('mv -f uploads/* ./archive')) {
    $f = fopen("files/files", "a");
    ftruncate($f, 0);
    fclose($f);
  }
}

header("Location: admin.php")

?>