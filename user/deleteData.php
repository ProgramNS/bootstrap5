<?php
    require_once __DIR__ . './getConnection.php';

    $connection = getConnection();
    $id = $_GET['id'];
    $sql = $connection -> prepare("delete from tb_product where id=?");
    $sql -> execute(array($id));
    echo "<script>alert('Data berhasil dihapus');window.location='product.php'</script>";
?>