<?php
    require_once __DIR__ . './src/cdnBootstrap.php';
    require_once __DIR__ . './src/cdnFontAwesome.php';
    require_once __DIR__ . './database/getConnection.php';


    if(isset($_POST['submit'])){
        $connection = getConnection();
        $brand = $_POST['brand'];
        $ukuran = $_POST['ukuran'];
        $kondisi = $_POST['kondisi'];
        $foto = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $path ="upload/".$foto;

        if(move_uploaded_file($tmp,$path)){
        $sql = $connection -> prepare("insert into tb_product (brand,ukuran,kondisi_topi,foto) value(?,?,?,?)");
        $sql -> execute(array($brand,$ukuran,$kondisi,$foto));
        echo "<script>alert('Tambah Data Berhasil');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <!-- Modal -->
    <form method="POST" enctype="multipart/form-data">
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-floating">
                <input type="test" class="form-control mb-3" id="floatingInput" placeholder="Nama Brand" name="brand"/>
                <label for="floatingInput">Nama Brand</label>
              </div>
              <div class="form-floating">
                <select class="form-select mb-3" id="floatingSelect" aria-label="Floating label select example" name="ukuran">
                  <option selected>Pilih Ukuran</option>
                  <option value="S">S</option>
                  <option value="M">M</option>
                  <option value="L">L</option>
                  <option value="XL">XL</option>
                  <option value="XXL">XXL</option>
                </select>
                <label for="floatingSelect">Memilih Ukuran</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control mb-3" id="floatingInput" placeholder="Model Topi" name="kondisi"/>
                <label for="floatingInput">Kondisi Topi</label>
              </div>
              <label for="exampleFormControlInput1" class="form-label text-sm">Max file 500kb (.jpg)</label>
              <div class="input-group">
                <input type="file" name="gambar" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>
