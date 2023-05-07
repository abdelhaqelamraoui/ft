<?php

require_once('app/functions.php');
if(is_admin_authenticated()) {
  redirect('admin.php');
}


  load_view('admin/login', get_uploaded_filenames());

  if(is_post()) {
    if(isset($_POST['log-in'])) {
      $usrername = sanitize($_POST['username']);
      if(login_admin($usrername) === true) {
        redirect('login.php');
      }
    }
  }
?>