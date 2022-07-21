<?php
    require_once __DIR__ . './getConnection.php';


    if(isset($_POST['submit'])){
        $connection = getConnection();
        $brand = $_POST['brand'];
        $ukuran = $_POST['ukuran'];
        $kondisi = $_POST['kondisi'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $foto = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $size = $_FILES['gambar']['size'];
        $path ="upload/".$foto;

        if($size > 500000){
          echo "<script>alert('File terlalu besar');</script>";
          return false;
        } 
        if(move_uploaded_file($tmp,$path)){
        $sql = $connection -> prepare("update tb_product set 
                                       brand ='$brand',
                                       ukuran='$ukuran',
                                       kondisi_topi='$kondisi',
                                       deskripsi='$deskripsi',
                                       harga='$harga',
                                       foto='$foto'
                                       ");
        $sql -> execute(array($brand,$ukuran,$kondisi,$harga,$deskripsi,$foto));
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
    <!-- Link bootstrap v5.2.0 bundle css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
    <!-- Link bootstrap v5.2.0 bundle js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" defer></script>
    <!-- Link font-awesome v6.1.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  </head>
  <body>
    <!-- Modal -->
    <form method="POST" enctype="multipart/form-data">
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
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
                <select class="form-select mb-3" id="floatingSelect" aria-label="Floating label select example" name="kondisi">
                  <option selected>Pilih Kondisi Topi</option>
                  <option value="Second 90%">Second 90%</option>
                  <option value="Second 85%">Second 85%</option>
                  <option value="Second 80%">Second 80%</option>
                  <option value="Second 75%">Second 75%</option>
                  <option value="Second 70%">Second 70%</option>
                </select>
                <label for="floatingSelect">Kondisi Topi</label>
              </div>
              <div class="form-floating">
                <textarea class="form-control mb-3" placeholder="Deskripsi Topi..." name="deskripsi" id="FloatingTextarea"></textarea>
                <label for="floatingTextarea">Deskripsi Topi</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control mb-3" id="floatingInput" placeholder="Model Topi" name="harga"/>
                <label for="floatingInput">Harga</label>
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
