<?php
// Memanggil session_start() pada awal file
session_start();

// Jika belum login
if(isset($_SESSION['log'])) {

} else {
    header('location:login.php');
    exit(); // Pastikan keluar dari skrip setelah mengarahkan pengguna
}
?>
