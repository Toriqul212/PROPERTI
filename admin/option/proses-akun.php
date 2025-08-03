<?php

include("../../koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['edit'])) {

    // ambil data dari formulir
    $id_akun = $_POST['id'];
    $password = $_POST['password'];
    // buat query update
    $sql = "UPDATE t_akun SET password='$password' WHERE id_akun=$id_akun";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: option-akun.php?status=sukses');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
