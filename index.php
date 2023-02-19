<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>FT</title>
</head>

<body class="container-fluid px-0 pt-5">

  <?php include("header.php"); ?>

  <div class="container mt-5">

    <div class="card ">
      <div class="card-header text-center">
        <h3 class="card-title">Submitted files by the admin</h3>
        <p class="cart-text text-muted" style="font-size: 13px;">
          By clicking on the file's name you can view it immediately, or you can donwnload it by clicking on the download button ^_^
        </p>
      </div>
      <div class="card-body text-center">
        <div class="list-group">
        
        <?php
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);

        const FILENAME_UF = "files/files";
        const FILENAME_RF = "files/readfilename";
        const DIR_UPLOAD = "uploads";

          $filenames = file(FILENAME_UF);
          // var_dump($filenames);

          if(!$filenames) {

            echo("Error accessing ressources !!");

          } else {
            
            if(count($filenames) === 0) {

              echo "Nothing uploaded yet! <br>  -_-<br>";
              return;

            } else {

              foreach($filenames as $fn) {
                $p = DIR_UPLOAD."/$fn"; // the path of the file
                $f = fopen(FILENAME_RF, "w");
                fwrite($f, $p);
                echo '
                <div class="list-group-item d-flex justify-content-between align-items-center">
                <a href="readfile.php" class="">'.$fn.'</a>
                <a href="'.$p.'" class="nav-link" download="'.$fn.'">
                  <button  class="btn btn-primary">Download</button>
                </a>
              </div>
                ';
              }
            }

          }

        ?>
         
        </div>


      </div>
    </div>


  </div>

</body>

</html>