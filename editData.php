<?php
    require_once __DIR__ . './database/getConnection.php';
    $conncection = getConnection();
    $id = $_GET['id'];
    $sql = $conncection -> prepare("select * from tb_product where id=?"); 
    $sql -> execute(array($id)); 
    $data = $sql -> fetch();

    if(isset($_POST['kembali'])){
        header("location:product.php");
    }

    if(isset($_POST['edit'])){
        $connection = getConnection();
        $id = $_GET['id'];
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
            $sql = $connection -> prepare(" update tb_product set 
                                            brand =?,
                                            ukuran=?,
                                            kondisi_topi=?,
                                            deskripsi=?,
                                            harga=?,
                                            foto=? where id=?
                                            ");
            $sql -> execute(array($brand,$ukuran,$kondisi,$deskripsi,$harga,$foto,$id));
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
        <div class="form container-fluid bg-light bg-opacity-50 w-50 mt-5 md-4">
            <h5 class="fw-medium">Edit Data</h5>
        <div class="form-floating">
            <input type="text" class="form-control mb-3" id="floatingInput" placeholder="Nama Brand" name="brand" value="<?php echo $data['brand']?>"/>
            <label for="floatingInput">Nama Brand</label>
        </div>  
              <div class="form-floating">
                <select class="form-select mb-3" id="floatingSelect" aria-label="Floating label select example" name="ukuran" >                
                  <option selected value="<?php echo $data['harga']?>"><?php echo $data['ukuran']?></option>
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
                  <option selected value="<?php echo $data['harga']?>"><?php echo $data['kondisi_topi']?></option>
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
                <input type="text" class="form-control mb-3" id="floatingInput" placeholder="Model Topi" name="harga" value="<?php echo $data['harga']?>" />
                <label for="floatingInput">Harga</label>
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