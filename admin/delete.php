<?php
    require_once('../database/getConnection.php');

    $connection = getConnection();
    $id = $_GET['id'];
    $sql = $connection -> prepare("delete from tb_product_diskon where id=?");
    $sql -> execute(array($id));
    echo "<script>alert('Data berhasil dihapus');window.location='jumbotronAdmin.php'</script>";
?>