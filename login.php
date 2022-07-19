<?php
    require_once __DIR__ . './src/cdnBootstrap.php';
    require_once __DIR__ . './src/cdnFontAwesome.php';
    require_once __DIR__ . './database/getConnection.php';
?>
    

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
  </head>
  <body>
    <section class="card container-fluid bg-light py-3" style="width: 45%; margin-top: 10rem">
      <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
          <form class="form-container" method="POST">
            <h4 class="text-center font-weight-bold">Sign-In</h4>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" />
            </div>
            <div class="form-group">
              <label for="InputPassword">Password</label>
              <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password" />
              <p class="text-danger"></p>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
            <div class="form-footer mt-2">
              <p>Belum punya account? <a href="register.php">Register</a></p>
            </div>
            <?php
            // get conection to database
                $connection = getConnection();

                // logic dari button submit
                if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    
                    // $sql = "SELECT * FROM tb_register_login WHERE username = :username";
                    $sql = $connection -> prepare("select * from tb_register_login where username =? and password =?");
                    $sql->execute(array($username,$password));                
                    $count = $sql->fetchColumn();
                    
                    if($count == true){
                      header("location:index.php");
                    }
                        else{
                          echo "<script>alert('gagal')</script>";
                          }
                  }
            ?>
          </form>
        </section>
      </section>
    </section>
  </body>
</html>