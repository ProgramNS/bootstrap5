<?php
    require_once __DIR__ . './cdnBootstrap.php';
    require_once __DIR__ . './cdnFontAwesome.php';
    require_once __DIR__ . './getConnection.php';

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topi Second</title>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Second Hat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px">
            <li class="nav-item">
              <a class="nav-link" href="product.php">Data Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="jumbotronAdmin.php">Data Product Diskon</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./login.php"><?php echo $_SESSION['username']['username'];?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</body>
</html>