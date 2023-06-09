

<?php

  require_once('app/functions.php');
  start_admin_session();


?>


<nav class="navbar navbar-expand-lg bg-dark position-fixed top-0 start-0 end-0" id="header">
		<div class="container-fluid ">
			<a class="navbar-brand text-light" href="index.php"><?=CONFIG['app_name']?></a>
			<button class="navbar-toggler border border-1 border-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<div class="toggler-button">
					<div></div>
					<div></div>
					<div></div>
				</div>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active link-warning" aria-current="page" href="./admin.php">Admin</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active link-warning" aria-current="page" href="index.php">Client</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active link-light" aria-current="page" href="#" id="link-about">About</a>
					</li>
						
				</ul>

        <?php if(is_admin_authenticated()):?>
          <form method="post">
            <Button type="submit" name="logout" class="btn btn-sm btn-outline-warning">Log out</Button>
          </form>
        <?php endif;?>
				
			</div>
		</div>
	</nav>


<?php

  if(is_post()) {
    if(isset($_POST['logout'])) {
      logout_admin();      
    }
  }

?>