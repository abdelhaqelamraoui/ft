
<?php

  require_once('app/functions.php');

?>

<script src="./assests/js/index.view.js"></script>

<div class="container mt-5 pb-5">

  <div class="card">
    <div class="card-header text-center">
      <h3 class="card-title">Les fichiers déposés</h3>
    </div>

    <div class="card-body text-center">
      <ul class="list-group" id="list-uploaded-files">
        <?php foreach($model as $fname): ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="#" class="text-break"><?=$fname?></a>
            <a href="<?=CONFIG['uploads_path'].'/'.$fname?>" class="nav-link" download="<?=$fname?>">
              <button  class="btn btn-sm btn-primary">Download</button>
            </a>
          </li>
          <?php endforeach;?>
      </ul>
    </div>