<?php
session_start();

//Koneksi ke database
$conn = mysqli_connect("localhost","root","","bagus_teknik");


//menambah produk
if(isset($_POST['addproduk'])){
    $nama = $_POST['nama'];
    $foto = $_POST['foto'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    
    $addtotable = mysqli_query($conn, "INSERT INTO produk (nama, foto, deskripsi, harga, stok) VALUES ('$nama','$foto','$deskripsi','$harga','$stok')");
    if ($addtotable){
        header('location:index.php');
    }else{
        echo "gagal";
        header('location:index.php');
    }
}

?>