<?php

include("../../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['daftar'])) {

    // ambil data dari formulir
    $kd_rumah = $_POST['kd_rumah'];
    $jenis_rumah = $_POST['jenis_rumah'];
    $harga = $_POST['harga'];
    $unit = $_POST['unit'];
    // buat query
    $sql = "INSERT INTO t_rumah (kd_rumah, jenis_rumah, harga, unit) 
    VALUES ('$kd_rumah', '$jenis_rumah', '$harga', '$unit')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ../data-rumah.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: user.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
