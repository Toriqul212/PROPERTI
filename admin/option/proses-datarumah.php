<?php

include("../../koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['edit'])) {

    // ambil data dari formulir
    $kd_rumah = $_POST['id'];
    $harga = $_POST['harga'];
    // buat query update
    $sql = "UPDATE t_rumah SET harga='$harga' WHERE kd_rumah=$kd_rumah";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: ../data-rumah.php?status=sukses');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
