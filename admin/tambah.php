<?php 
    require_once('jumbotronAdmin.php');
    require_once('../database/getConnection.php');
    if(isset($_POST['submit'])){
        $connection = getConnection();
        $brand = $_POST['brand'];
        $ukuran = $_POST['ukuran'];
        $kondisi = $_POST['kondisi'];
        $deskripsi = $_POST['deskripsi'];
        $hargaAsli = $_POST['hargaAsli'];
        $hargaDiskon = $_POST['hargaDiskon'];
        $foto = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $size = $_FILES['gambar']['size'];
        $path ="upload/".$foto;
        if($size > 500000){
          echo "<script>alert('File terlalu besar');</script>";
          return false;
        } 
        if(move_uploaded_file($tmp,$path)){
        $sql = $connection -> prepare("insert into tb_product_diskon (brand,ukuran,kondisi_topi,deskripsi,harga_asli,harga_diskon,foto) value(?,?,?,?,?,?,?)");
        $sql -> execute(array($brand,$ukuran,$kondisi,$deskripsi,$hargaAsli,$hargaDiskon,$foto));
        echo "<script>alert('Tambah Data Berhasil');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Modal -->
    <form method="POST" enctype="multipart/form-data">
      <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="text" class="form-control mb-3" id="floatingInput" placeholder="Model Topi" name="hargaAsli"/>
                <label for="floatingInput">Harga Asli</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control mb-3" id="floatingInput" placeholder="Model Topi" name="hargaDiskon"/>
                <label for="floatingInput">Harga Diskon</label>
              </div>
              <label for="exampleFormControlInput1" class="form-label text-sm">Max file 500kb (.jpg)</label>
              <div class="input-group">
                <input type="file" name="gambar" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required/>
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