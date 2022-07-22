<?php
    require_once __DIR__ . './cdnBootstrap.php';
    require_once __DIR__ . './cdnFontAwesome.php';
    require_once __DIR__ . './getConnection.php';
   
    //get conection to database
    $connection = getConnection();

    // logic dari button submit
    if(isset($_POST['submit'])) {
        $nama = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $rePassword = $_POST['re_password'];
        
        $sql = "INSERT INTO tb_register_login (nama,email,username,password,re_password) 
                VALUE(:nama,:email,:username,:password,:rePassword)";
        $result = $connection->prepare($sql);
        $params = array (
            ":nama" => $nama,
            ":email" => $email,
            ":username" => $username,
            ":password" => $password,
            ":rePassword" => $rePassword
        );
        $saved = $result->execute($params);
        if ($saved) {
            header("location:login.php");
        }
        $connection = null;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
  </head>
  <body>
    <section class="card container-fluid bg-light py-3" style="width: 50%;margin-top:4rem;">
      <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
      <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
          <form class="form-container" method="POST">
            <h4 class="text-center font-weight-bold py-4">Sign-Up</h4>
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" required/>
            </div>
            <div class="form-group">
              <label for="InputEmail">Alamat Email</label>
              <input type="email" class="form-control" id="InputEmail" name="email" aria-describeby="emailHelp" placeholder="Masukkan email"required />
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username"required />
            </div>
            <div class="form-group">
              <label for="InputPassword">Password</label>
              <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password" required/>
              <p class="text-danger"></p>
            </div>
            <div class="form-group">
              <label for="InputPassword">Re-Password</label>
              <input type="password" class="form-control" id="InputRePassword" name="re_password" placeholder="Re-Password " required/>
              <p class="text-danger"></p>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
            <div class="form-footer mt-2">
              <p>Sudah punya account? <a href="login.php">Login</a></p>
            </div>
          </form>
        </section>
      </section>
    </section>
  </body>
</html>
