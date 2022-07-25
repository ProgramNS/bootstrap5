<?php
    require_once('cdnBootstrap.php');
    require_once('cdnFontAwesome.php');
    require_once('./database/getConnection.php');
    $connection = getConnection();
    $sql = $connection -> prepare("select * from tb_product_diskon");
    $sql -> execute();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
     <!-- Jumbotron Text -->
    <div class="container-mw-100 d-flex">
      <div class="py-4 px-4 px-md-4 bg-dark bg-opacity-25 position-relative">
        <div class="container-fluid row align-items-start">
          <div class="container-mw-50">
            <div class="row align-items-start py-3 px-4 ms-5">
              <?php while ($data = $sql -> fetch()){?>
              <div class="col-md-4">
                <h1 class="fw-medium display-5">Spesial Offer Sale NIKE</h1>
                <div class="card w-75">
                  <img src="admin/upload/<?php echo $data['foto'];?>" class="card-img-top" alt="nike" />
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $data['brand'];?></h5>
                    <p class="card-text"><?php echo $data['kondisi_topi'];?></p>
                    <p class="card-text text-decoration-line-through">Rp. <?php echo $data['harga_asli'];?></p>
                    <p class="card-text mt-4">Rp. <?php echo $data['harga_diskon'];?></p>
                    <p class="card-text"><?php echo $data['deskripsi'];?></p>
                    <a href="./user/login.php" class='btn btn-primary btn-sm'>Beli Sekarang</a>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
