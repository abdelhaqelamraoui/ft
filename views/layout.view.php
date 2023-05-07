
<?php
	
	// include_once('');
?>

<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title><?=CONFIG['app_name']?></title>
</head>

<body class="container-fluid px-0 pt-5">
	<!-- the header -->
	<?php include('header.view.php'); ?>

	<script src="./assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="./assets/js/header.js"></script>


	<!-- the view -->
	<div class="container mt-5 pb-5">
		<?php
			include("views/$view_name.view.php");
		?>
	</div>


	<!-- the footer -->
	<!-- <?php include('./footer.view.php'); ?> -->

	<div class="bg-dark text-center text-light position-fixed bottom-0 start-0 end-0" style="font-size: 12px; z-index: 8000;">
		<?php echo "Abdelhaq EL AMRAOUI 2023-".date('Y')." &copy"; ?>
		<a href="mailto:abdelhaqelamraoui@gmail.com">contacter</a>
	</div>

  
</body>

</html>