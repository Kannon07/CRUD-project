<?php
include 'koneksi.php';

$kode        = "";
$nama        = "";
$foto_produk = "";
$deskripsi   = "";
$harga       = "";
$stok        = "";
$sukses      = "";
$error       = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id_produk = $_GET['id_produk'];
    $sql1  = "DELETE FROM tb_produk WHERE id_produk = '$id_produk'";
    $q1    = mysqli_query($conn, $sql1);
    if ($q1) {
        $sukses = "Berhasil Delete Data";
    }else {
        $error = "Gagal Delete data";
    }   
}

if ($op == 'edit') {
    $id_produk = $_GET['id_produk'];
    $sql1      = "SELECT * FROM tb_produk WHERE id_produk = '$id_produk'";
    $q1        = mysqli_query($conn, $sql1);
    $r1        = mysqli_fetch_array($q1);
    if ($r1) {
        $kode        = $r1['kode'];
        $nama        = $r1['nama'];
        $foto_produk = $r1['foto'];
        $deskripsi   = $r1['deskripsi'];
        $harga       = $r1['harga'];
        $stok        = $r1['stok'];
    } else {
        $error = "Data tidak ditemukan";
    }
}

// untuk membuat data
if (isset($_POST['save'])) {
    $newKode     = $_POST['kode'];
    $nama        = $_POST['nama'];
    $foto_produk = $_POST['foto'];
    $deskripsi   = $_POST['deskripsi'];
    $harga       = $_POST['harga'];
    $stok        = $_POST['stok'];

    // Check if kode is already present in the table
    $checkQuery = "SELECT * FROM tb_produk WHERE kode = '$newKode'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0 && $newKode !== $kode) {
        $error = "Kode sudah ada, silakan gunakan kode lain.";
    } else {
        if ($op == 'edit') { // untuk update
            if ($newKode === $kode && $nama === $r1['nama'] && $foto_produk === $r1['foto'] && $deskripsi === $r1['deskripsi'] && $harga === $r1['harga'] && $stok === $r1['stok']) {
                $sukses = "Tidak ada perubahan yang dilakukan pada data";
            } else {
                $sql1 = "UPDATE tb_produk SET kode = '$newKode', nama = '$nama', foto = '$foto_produk', deskripsi = '$deskripsi', harga = '$harga', stok = '$stok' WHERE id_produk = '$id_produk'";
                $q1   = mysqli_query($conn, $sql1);
                if ($q1) {
                    $sukses = "Data berhasil diupdate";
                } else {
                    $error = "Data gagal diupdate";
                }
            }
        } else { //untuk create
            $sql1 = "INSERT INTO tb_produk (kode, nama, foto, deskripsi, harga, stok) VALUES ('$newKode', '$nama', '$foto_produk', '$deskripsi', '$harga', '$stok')";
            $q1   = mysqli_query($conn, $sql1);

            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data baru";
            }
        }
    }
}
?>
