<?php
    require_once('../database/getConnection.php');
    require_once('../src/cdnBootstrap.php');
    require_once('../src/cdnFontAwesome.php');
    require_once('./sessionUser.php');
    $conection = getConnection();
    $sql = $conection -> prepare("select * from tb_product");
    $sql->execute();
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Topi Second</title>
    </head>
    
    <body>
        <div class="row">
            <?php

while($data = $sql -> fetch()){
    ?>
                <div class="col-md-4 col-lg-3 pb-3 g-5">
                    <div class="card ms-2">
                        <div class="card-header text-center"><?=$data['brand']?></div>
                        <center> <img src="../admin/upload/<?=$data['foto']?>" class="card-img-top w-100" alt="..."></center>
                        <div class="card-body">
                            <p class="card-text">Rp.<?=$data['harga']?></p>
                            <p class="card-text">Ukuran: <?php echo $data['ukuran'];?></p>
                            <p class="card-text"><?=$data['deskripsi']?></p>
                        </div>
                        <div class="card-footer">
                            <center> <a href="checkoutNormal.php?id=<?php echo $data['id'];?>"><button class="btn btn-primary">Beli Sekarang</button></a></center>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </body>
            </html>
<?php require_once('../src/footer.php'); ?>