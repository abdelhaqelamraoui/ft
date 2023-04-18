
<?php
  session_start();
  if(!isset($_SESSION['username'])) {
    header('Location: index_admin.php');
    exit(-1);
  } else {

    $last_login = $_COOKIE['last_login'] ?? 'now';
    $name = 'last_login';
    $value = date("d/m/Y h:i:s a");
    $expire = strtotime('next year');
    $path = '/ft';
    $domain = $_SERVER['SERVER_NAME'];
    setcookie($name, $value, $expire, $path, $domain);
  }
?>


<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Admin</title>
</head>

<body class="container-fluid px-0 pt-5">

  <?php include("header.php"); ?>

  <div class="container-fluid container-lg pb-sm-4 pb-md-4">

    <div class="row mt-5">

      <div class="col-lg-4 col-md-4 col-sm-5 mb-3">
        <ul class="list-group" id="list-uploaded-files">
          <li class="list-group-item list-group-item-action active d-flex justify-content-center">
            <div class="me-auto align-text-bottom pt-1">Les fichiers déposés</div>
            <div>
              <button type="submit" form="files-form" class="btn btn-sm btn-danger t" name="clean">Supprimer</button>
            </div>
          </li>
          <?php
            $files = scandir('./uploads');
            $uploaded_files = array_diff($files, ['.', '..']);
            if(!empty($uploaded_files)) {
              foreach($uploaded_files as $fu) {
                echo '<li class="list-group-item text-break">'.$fu.'</li>';
              }
            }
          ?>
        </ul>
      </div>

      <div class="col col-lg col-sm-7 position-sticky sticky-top sticky-bottom mb-5">
        <div class="card mb-4">
          <div class="card-header text-center ">
            <h6 class="card-title mb-0">Séléctionner des fichiers à déposer</h6>
            <p style="font-size: 12px;"> <?php echo "Last login: ". $last_login; ?></p>
          </div>

          <div class="card-body p-0">
            <div class="list-group rounded-0" id="files-list">
              <form action="./admin_script.php" method="POST" enctype="multipart/form-data" id="files-form">
                <div class="list-group-item">
                  <input type="file" name="file-0" class="form-control">
                </div>
              </form>

              <div class="list-group-item">
                <button id="btn-add" class="btn btn-sm btn-outline-success">+ ajouter</button>
              </div>

            </div>
          </div>

          <div class="card-footer text-center">
              <button type="submit" form="files-form" class="btn btn-success px-5 rounded" name="upload" id="btn-upload">Déposer</button>
          </div>

        </div>

      </div>

    </div>
  </div>

  <script src="./admin.js"></script>

  <?php include("footer.php"); ?>

</body>

</html>


