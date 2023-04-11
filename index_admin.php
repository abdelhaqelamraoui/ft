
<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body class="container d-flex align-items-center justify-content-center">
  <?php include("header.php"); ?>

  <form method="post" class="p-4 mx-3 border border-2 border-success rounded text-center">
    <div class="input-group row-sm  border border-2 border-success rounded-2">
      <label for="username" class="input-group-text col-sm-3 text-bg-success rounded-0 border-0">Username</label>
      <input type="text" name="username" pattern="\w{4,}" placeholder="tx37s_d8" class="form-control col-sm ps-2 rounded-end border-0" required>
    </div>
    <Button type="submit" name="submit" class="btn btn-outline-success px-5 mt-3">Log in </Button>
  </form>

  <script src="./admin.js"></script>
  <?php include("footer.php"); ?>
</body>
</html>

<?php

  if(isset($_POST['submit'])) {
    $usrername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $usrername = trim($usrername); // already handled via the pattern in html
    if($usrername == 'admin') {
      $_SESSION['username'] = $usrername;
      header('Location: admin.php');
    } else {
      echo "<script>alert('Not an admin')</script>";
    }
  }



?>