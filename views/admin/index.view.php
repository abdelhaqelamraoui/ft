<?php

require_once('app/app.php');

?>

<div class="container-fluid container-lg pb-sm-4 pb-md-4">
  <div class="row mt-5">
    <div class="col-lg-4 col-md-4 col-sm-5 mb-3">
      <ul class="list-group">

        <li class="list-group-item list-group-item-action active d-flex justify-content-center">
          <div class="me-auto align-text-bottom pt-1">Les fichiers déposés</div>

          <!-- TODO: find why it is not working with two forms in a page ? -->
          <!-- <form action="admin.script.php" name="clean-form" id="clean-form" method="POST">
            <input type="submit" name="clean" id="btn-clean" form="clean-form" value="Supprimer" class="btn btn-sm btn-danger">
          </from> -->
          <button type="submit" name="clean" id="btn-clean" form="upload-form" class="btn btn-sm btn-danger">Supprimer</button>

        </li>

        <div id="list-uploaded-files">
          <?php foreach ($model as $fname) : ?>
            <li class="list-group-item text-break"><?= $fname ?></li>
          <?php endforeach ?>
        </div>

      </ul>
    </div>

    <div class="col col-lg col-sm-7 position-sticky sticky-top sticky-bottom mb-5">
      <form action="admin.script.php" name="upload-form" id="upload-form" method="POST" enctype="multipart/form-data">
        <div class="card mb-4">
          <div class="card-header text-center ">
            <h6 class="card-title mb-0">Séléctionner des fichiers à déposer</h6>
            <p style="font-size: 12px;" class="mb-0">Last login: <?= $_SESSION['last_login'] ?></p>
          </div>

          <div class="card-body p-2">
            <div class="list-group">
              <div id="files-inputs">
                <div class="list-group-item border-0 p-1">
                  <input type="file" name="files[]" form="upload-form" class="form-control" multiple>
                </div>
              </div>

              <div class="list-group-item border-0 p-1">
                <button id="btn-add" type="button" form="upload-form" class="btn btn-sm btn-outline-success border border-success">+ ajouter</button>
              </div>
            </div>
          </div>

          <div class="card-footer text-center">
            <input type="submit" name="upload" id="btn-upload" value="Déposer" class="btn btn-success px-5 rounded" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="assets/js/admin.view.js"></script>