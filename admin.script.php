

<?php

  require_once('app/functions.php');

  if(is_post()) {

    if (isset($_POST['upload'])) {
      if (!empty($_FILES)) {
        foreach ($_FILES as $file) {
          alert('there is a file');
          upload_multiple_files($file);        
        }
      }
    } elseif (isset($_POST['clean'])) {
      archive_all_uploads();
    }
  
  }
redirect('admin.php');

?>