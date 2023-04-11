
<?php
  session_start();
  if(!isset($_SESSION['username'])) {
    header('Location: index_admin.php');
    exit(-1);
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

<script>
  // function refreshList() {
  //   let listUploadedFiles = document.getElementById('list-uploaded-files')
  //   let fileContent = document.getElementById('bridge-file-content')
  //   // TODO use another script and use fetch method
  //   let filenamesArr = document.getElementById('bridge-file-content').innerText.split('\n')
  //   filenamesArr.forEach(element => {
  //     console.log(element)
  //     let li = document.createElement('li')
  //     li.className = "list-group-item"
  //     li.innerText = element
  //     listUploadedFiles.appendChild(li)
  //   })
  // }
</script>

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
            const FILENAME_UF = "files/files";
            $upfilenames = file(FILENAME_UF);
            // if(isset($_POST['clean']) || $upfilenames == false || count($upfilenames) == 0) {
            //   echo '<li class="list-group-item">No file is uploaded</li>';
            // } else {
              foreach($upfilenames as $fu) {
                echo '<li class="list-group-item text-break">'.$fu.'</li>';
              // }
            }
          ?>
        </ul>
      </div>

      <div class="col col-lg col-sm-7 position-sticky sticky-top sticky-bottom mb-5">
        <div class="card mb-4">
          <div class="card-header text-center ">
            <h6 class="card-title mb-0">Séléctionner des fichiers à déposer</h6>
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


