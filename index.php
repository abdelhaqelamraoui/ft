<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>FT</title>
</head>

<body class="container-fluid px-0 pt-5">

  <?php include("header.php"); ?>

  <script src="index.js"></script>

  <div class="container mt-5 pb-5">

    <div class="card">
      <div class="card-header text-center">
        <h3 class="card-title">Les fichiers déposés</h3>
      </div>

      <div class="card-body text-center">
        <ul class="list-group" id="list-uploaded-files">
          <?php
          
            ini_set('display_errors', '1');
            ini_set('display_startup_errors', '1');
            error_reporting(E_ALL);

            $dirs = ["uploads", "files", "archive"];

            try {

              foreach($dirs as $d)
                if(!is_dir($d))
                  mkdir($d);
            
              $files = scandir($dirs[0]);
              $uploaded_files = array_diff($files, ['.', '..']);

              if(empty($uploaded_files)) {
                echo "Rien n'est encore déposé! <br>  -_-<br>";
              } else {
                foreach($uploaded_files as $uf) {
                  echo <<< EOF
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="#" class="text-break">$uf</a>
                    <a href="$dirs[0]/$uf" class="nav-link" download="$uf">
                      <button  class="btn btn-primary">Download</button>
                    </a>
                  </li>
                  EOF;
                }
              }
            } catch (Exception $e) {
              // print($e);
              print('Error: Permission denied!<br');
            }


          ?>
        </ul>
    </div>

  </div>
<?php include("footer.php"); ?>
</body>

</html>