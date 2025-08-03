<?php

include("../../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['daftar'])) {

    // ambil data dari formulir
    $kd_pemesanan = $_POST['kd_pemesanan'];
    $kd_pemesanan = $_POST['kd_pemesanan'];
    $kd_pembayaran = $_POST['kd_pembayaran'];
    $nik = $_POST['nik'];
    $kd_rumah = $_POST['kd_rumah'];
    $tanggal_waktu = date('Y-m-d');
    // buat query
    $sql = "INSERT INTO t_pemesanan (kd_pemesanan, kd_pembayaran, nik, kd_rumah, tanggal_waktu) 
    VALUES ('$kd_pemesanan', '$kd_pembayaran', '$nik', '$kd_rumah', '$tanggal_waktu')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ../data-rumah.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: ../index.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
