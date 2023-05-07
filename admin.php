<?php

require_once('app/app.php');
ensure_admin_authenticated();

load_view('admin/index', get_uploaded_filenames());


if(is_post()) {

  if (isset($_POST['upload'])) {
    if (!empty($_FILES)) {
      alert('got it');
      foreach ($_FILES as $file) {
        upload_multiple_files($file);        
      }
    }
  }
  
  if (isset($_POST['clean'])) {
    archive_all_uploads();
  }

}

?>

