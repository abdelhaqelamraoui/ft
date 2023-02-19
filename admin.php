<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

  <title>Admin</title>
</head>

<body class="container-fluid px-0 pt-5">
  <?php include("header.php"); ?>

  <div class="row mt-5 px-5">

    <div class="col col-lg-2 col-md-2 mb-3">
      <ul class="list-group ">
        <li class="list-group-item list-group-item-action active">Uploaded files</li>
        <?php
          const FILENAME_UF = "files/files";
          $upfilenames = file(FILENAME_UF);
          if(!$upfilenames || count($upfilenames) == 0) {
            echo '<li class="list-group-item">No file is uploaded</li>';
          } else {
            foreach($upfilenames as $fu) {
              echo '<li class="list-group-item">'.$fu.'</li>';
            }
          }
        ?>
      </ul>
    </div>

  <div class="col">
    <!-- <div class="container  "> -->
    <div class="card">
      <div class="card-header text-center">
        <h4 class="card-title">File uploader</h4>
        <p class="card-subtitle " style="font-size: 14px;">Select files to share with others in wifi nework</p>
      </div>

      <div class="card-body">
        <div class="list-group" id="files-list">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" id="files-form">

            <div class="list-group-item">
              <input type="file" name="file-0" id="">
            </div>

          </form>

          <div class="list-group-item sticky-bottom">
            <button id="btn-add" class="btn btn-sm btn-outline-success">+ add other files</button>
          </div>

        </div>
      </div>


      <div class="card-footer text-center sticky-bottom">
        <button type="submit" form="files-form" class="btn btn-outline-danger px-1 me-5" name="clean">Clean Uploads</button>
        <button type="submit" form="files-form" class="btn btn-outline-success px-2" name="submit">Upload files</button>
      </div>

    </div>
    <!-- </div> -->

  </div>

</div>


  <script src="./admin.js"></script>
</body>

</html>


<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$targer_dir = "uploads";
// const FILENAME_UF = "files/files";

if (isset($_POST['submit'])) {

  if (isset($_FILES) && count($_FILES) > 0) {
    foreach ($_FILES as $f) {
      $file_name = $f['name'];
      $file_tmp_name = $f['tmp_name'];
      $file_name_target = "$targer_dir/$file_name";
      move_uploaded_file($file_tmp_name, $file_name_target);
      $fup = fopen(FILENAME_UF, 'w');
      fwrite($fup, $file_name);
      fclose($fup);
    }
  }

  /*  $file_name = $_FILES['file-0']['name'];
  $file_tmp_name = $_FILES['file-0']['tmp_name'];
  echo "<pre>";
  print_r($_FILES);
  echo "</pre>";
  $targer_dir = "uploads/";

  move_uploaded_file($file_tmp_name, $targer_dir . $file_name);

  $f = fopen("files/files.txt", "w");
  fwrite($f, $file_name);
  fclose($f); */
}

if (isset($_POST['clean'])) {
  (system('rm -rf uploads/*'));
  // (system('del \f uploads/*'));
  $f = fopen("files/files", "a");
  ftruncate($f, 0);
  fclose($f);

  $f = fopen("files/readfilename", "a");
  ftruncate($f, 0);
  fclose($f);
}



?>