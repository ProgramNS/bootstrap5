<?php
    require_once __DIR__ . './src/cdnBootstrap.php';
    require_once __DIR__ . './src/cdnFontAwesome.php';
    require_once __DIR__ . './src/navbar.php';
    require_once __DIR__ . './database/tambahData.php';
    require_once __DIR__ . './database/getConnection.php';          
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product</title>
  </head>
  <body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-5 ms-4" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah Data</button>
    <!-- Tabel Produk -->
    <div class="container-fluid w-100 bg-dark bg-opacity-10 mt-4 mb-2">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Brand</th>
            <th scope="col">Ukuran</th>
            <th scope="col">Kondisi</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Harga</th>
            <th scope="col">Foto</th>
            <th scope="col">Action</th>
          </tr>
        </thead>        
        <tbody class="table-group-divider">
          <?php 
            $no = 1;
            $conncection = getConnection();
            $sql = $conncection -> prepare("select * from tb_product"); 
            $sql -> execute(); 
            $sql -> fetch();
            foreach($sql as $row) {
              ?>
            <tr>
              <th scope="row"><?php echo $no++;?></th>
              <td><?php echo $row['brand'];?></td>
              <td><?php echo $row['ukuran'];?></td>
              <td><?php echo $row['kondisi_topi'];?></td>
              <td><?php echo $row['deskripsi'];?></td>
              <td><?php echo $row['harga'];?></td>
              <td><img src='upload/<?php echo $row['foto'];?>'style='width:40px;'/></td>
              <td><a href="editData.php?id=<?php echo $row['id']?>" class='btn btn-primary btn-sm'>Edit</a>
                  <a href="deleteData.php?id=<?php echo $row['id']?>" class='btn btn-primary btn-sm'>Delete</a></td>         
            </tr>
            <?php }?>
            <?php $conncection = null;?>
          </tbody>
        </table>
    </div>
  </body>
</html>