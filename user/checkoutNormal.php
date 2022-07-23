<?php 
    require_once('../database/getConnection.php');
    require_once('../src/cdnBootstrap.php');
    require_once('../src/cdnFontAwesome.php');
    require_once('./sessionUser.php');

        
    $conncection = getConnection();
    $id = $_GET['id'];
    $sql = $conncection -> prepare("select * from tb_product where id=?"); 
    $sql -> execute(array($id)); 
    $data = $sql -> fetch();
    
    if(isset($_POST['submit'])){
      $nama = $_POST['nama'];
      $email = $_POST['email'];
      $brand = $_POST['brand'];
      $provinsi = $_POST['provinsi'];
      $alamat = $_POST['alamat'];
      $kota = $_POST['kota'];
      $kodePos = $_POST['kodePos'];
      $harga = $_POST['harga'];

      $conncection = getConnection();
      $sql = $conncection -> prepare("insert into tb_invoice(nama,email,nama_brand,provinsi,alamat,kota,kode_pos,harga) values(?,?,?,?,?,?,?,?)");
      $sql -> execute(array($nama,$email,$brand,$provinsi,$alamat,$kota,$kodePos,$harga));
      header("location:sukses.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <div class="container bg-light bg-opacity-400 w-75 mt-5 ">
    <form class="row g-3" method="POST">
        <h3 class="fst-italic text-center">Checkout</h3>
  <div class="col-md-4">
    <label for="" class="form-label">Nama</label>
    <div class="input-group">
      <input type="text" class="form-control" aria-describedby="inputGroupPrepend" name="nama"required>
    </div>
  </div>
  <div class="col-md-4">
    <label for="" class="form-label">Email</label>
    <div class="input-group">
      <input type="text" class="form-control" aria-describedby="inputGroupPrepend" name="email"required>
    </div>
  </div>
     <div class="col-md-4">
    <label for="" class="form-label">Nama_Brand</label>
    <input type="text" class="form-control" name="brand" value="<?php echo $data['brand'];?>" disable readonly>
  </div>
  <div class="col-mb-3">
    <label for="" class="form-label">Alamat</label>
    <textarea class="form-control"  name="alamat"rows="3"></textarea>
    </div>
  <div class="col-md-6">
    <label for="" class="form-label">Provinsi</label>
    <input type="text" class="form-control"  placeholder="Khusus DKI" name="provinsi">
  </div>
  <div class="col-md-3">
    <label for="" class="form-label">Kota</label>
    <select class="form-select" name="kota">
      <option selected disabled value="">Pilih Kota</option>
      <option value ="Jakarta Timur">Jakarta Timur</option>
      <option value ="Jakarta Utara">Jakarta Utara</option>
      <option value ="Jakarta Selatan">Jakarta Selatan</option>
      <option value ="Jakarta Barat">Jakarta Baratr</option>
    </select>
  </div>
  <div class="col-md-3">
    <label for="" class="form-label">Kode Pos</label>
    <input type="text" class="form-control" name="kodePos" required>
  </div>
  <div class="col-md-3 me-5">
    <label for="" class="form-label">Harga</label>
    <input type="text" class="form-control" name="harga" value="<?php echo $data['harga'];?>" disable readonly>
  </div>
  <input type="submit" name="submit" class="btn btn-primary" value="Beli">
</div>
</form>
</body>
</html>