<?php
    require_once('../src/cdnBootstrap.php');
    require_once('../src/cdnFontAwesome.php');
    require_once('sessionAdmin.php');
    require_once('../database/getConnection.php');          
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
    <button type="button" name="submit" class="btn btn-primary mt-4 ms-2" onclick="window.print()">Print</button>
    <div class="container-fluid w-100 bg-dark bg-opacity-10 mt-4 mb-2">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Nama Brand</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Alamat</th>
            <th scope="col">Kota</th>
            <th scope="col">Kode Pos</th>
            <th scope="col">Harga</th>
          </tr>
        </thead>        
        <tbody class="table-group-divider">
          <?php 
            $no = 1;
            $conncection = getConnection();
            $sql = $conncection -> prepare("select * from tb_invoice"); 
            $sql -> execute(); 
            $sql -> fetch();
            foreach($sql as $row) {
              ?>
            <tr>
              <th scope="row"><?php echo $no++;?></th>
              <td><?php echo $row['nama'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['nama_brand'];?></td>
              <td><?php echo $row['provinsi'];?></td>
              <td><?php echo $row['alamat'];?></td>
              <td><?php echo $row['kota'];?></td>
              <td><?php echo $row['kode_pos'];?></td>
              <td><?php echo $row['harga'];?></td>   
            </tr>
            <?php }?>
            <?php $conncection = null;?>
          </tbody>
        </table>
    </div>
  </body>
</html>