<?php
    require_once('../src/cdnBootstrap.php');
    require_once('../src/cdnFontAwesome.php');
    require_once('../database/getConnection.php');  
    
    $conncection = getConnection();
    $id = $_GET['id'];
    $sql = $conncection -> prepare("select * from tb_product_diskon where id=?"); 
    $sql -> execute(array($id)); 
    $data = $sql -> fetch();

    if(isset($_POST['kembali'])){
        header("location:jumbotronAdmin.php");
    }

    if(isset($_POST['edit'])){
        $connection = getConnection();
        $id = $_GET['id'];
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
            $sql = $connection -> prepare(" update tb_product_diskon set 
                                            brand =?,
                                            ukuran=?,
                                            kondisi_topi=?,
                                            deskripsi=?,
                                            harga_asli=?,
                                            harga_diskon=?,
                                            foto=? where id=?
                                            ");
            $sql -> execute(array($brand,$ukuran,$kondisi,$deskripsi,$hargaAsli,$hargaDiskon,$foto,$id));
            echo "<script>alert('Edit Data Berhasil');</script>";
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
        <div class="form container-fluid bg-light bg-opacity-50 w-50 mt-5 md-4">
            <h5 class="fw-medium">Edit Data</h5>
        <div class="form-floating">
            <input type="text" class="form-control mb-3" id="floatingInput" placeholder="Nama Brand" name="brand" value="<?php echo $data['brand']?>"/>
            <label for="floatingInput">Nama Brand</label>
        </div>  
              <div class="form-floating">
                <select class="form-select mb-3" id="floatingSelect" aria-label="Floating label select example" name="ukuran" >                
                  <option selected><?php echo $data['ukuran']?></option>
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
                  <option selected><?php echo $data['kondisi_topi']?></option>
                  <option value="Second 90%">Second 90%</option>
                  <option value="Second 85%">Second 85%</option>
                  <option value="Second 80%">Second 80%</option>
                  <option value="Second 75%">Second 75%</option>
                  <option value="Second 70%">Second 70%</option>
                </select>
                <label for="floatingSelect">Kondisi Topi</label>
              </div>
              <div class="form-floating">
                <textarea class="form-control mb-3" placeholder="Deskripsi Topi..." name="deskripsi" id="FloatingTextarea"><?php echo $data['deskripsi']?></textarea>
                <label for="floatingTextarea">Deskripsi Topi</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control mb-3" id="floatingInput" placeholder="Model Topi" name="hargaAsli" value="<?php echo $data['harga_asli'];?>"/>
                <label for="floatingInput">Harga Asli</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control mb-3" id="floatingInput" placeholder="Model Topi" name="hargaDiskon" value="<?php echo $data['harga_diskon'];?>"/>
                <label for="floatingInput">Harga Diskon</label>
              </div>
              <label for="exampleFormControlInput1" class="form-label text-sm">Max file 500kb (.jpg)</label>
              <div class="input-group">
                <input type="file" name="gambar" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload"/>
              </div>
              <button class='btn btn-primary btn-sm mt-3' type="submit" name="kembali">Kembali</button>
              <button class='btn btn-primary btn-sm mt-3' type="submit" name="edit">Edit</button>
            </div>
         </div>
    </div>
    </form>
  </body>
</html>