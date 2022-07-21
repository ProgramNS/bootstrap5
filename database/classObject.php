<?php
class Database
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "topi_second";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }
    public function add_data($brand, $ukuran, $kondisi,$deskripsi,$harga,$foto)
    {
        $sql = $this->db->prepare("insert into tb_product (brand,ukuran,kondisi_topi,deskripsi,harga,foto) value(?,?,?,?,?,?)");
        $sql->execute(array($brand,$ukuran,$kondisi,$deskripsi,$harga,$foto));
    }
    public function show()
    {
        $sql = $this->db->prepare("select * from tb_product"); 
        $sql -> execute();
        while ($data = $sql -> fetch()){
            $hasil[] = $data;
        } return $hasil;
    }

    public function get_by_id($id){
        $sql = $this->db->prepare("SELECT * FROM tb_product where id=?");
        $sql->bindParam(1, $id);
        $query->execute();
        return $sql->fetch();
    }

    public function update($id,$brand, $ukuran, $kondisi,$deskripsi,$harga,$foto){
        $sql = $this->db->prepare(" update tb_product set brand =?,ukuran=?,kondisi_topi=?,deskripsi=?,harga=?,foto=? where id=?");
        $sql->execute(array($brand, $ukuran, $kondisi,$deskripsi,$harga,$foto,$id));
    }

    public function delete($id)
    {
        $sql = $this->db->prepare("DELETE FROM tb_siswa where id=?");
        $sql->bindParam(1, $id);
        $sql->execute();
    }

}
?>