<?php
    require_once('../database/getConnection.php');
    require_once('../src/cdnBootstrap.php');
    require_once('../src/cdnFontAwesome.php');
    require_once('./sessionUser.php');

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $noHp = $_POST['no'];
        $komentar = $_POST['komen'];
        $connection = getConnection();
        $sql = $connection -> prepare("insert into tb_contact (email,no_hp,komentar) value(?,?,?)");
        $sql -> execute(array($email,$noHp,$komentar));
        echo "<script>alert('Pesan Berhasil Di Kirim');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <form class="form-control w-75" method="POST" style="margin-left:13%;margin-top:7%;">
    <div class="container w-75 me-5 mt-5">
        <h1>Contact Admin</h1>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control w-25" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
        <label for="exampleFormControlInput1" class="form-label">No Hp</label>
            <input type="number" class="form-control w-25" id="exampleFormControlInput1" placeholder="08956665877" name="no">
            <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
            <textarea class="form-control w-75" id="exampleFormControlTextarea1" rows="3" name="komen"></textarea>
        <button type="submit" name="submit" class="btn btn-primary mt-4">Kirim</button>
    </div>
    </form>
</body>
</html>