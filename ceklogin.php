<?php
// Menginclude file koneksi database
include 'koneksi.php';

// Mendapatkan input dari formulir login
$username = $_POST['username'];
$password = $_POST['password'];

// Siapkan query untuk memeriksa apakah username sudah ada
$stmt = mysqli_prepare($connection, "SELECT password FROM login WHERE username = ?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // Username ditemukan, verifikasi password
    if (password_verify($password, $row['password'])) {
        // Login berhasil
        echo '<script language="javascript">
            alert("Anda Berhasil Login!"); document.location="halaman.php";</script>';
    } else {
        // Password salah
        echo '<script language="javascript">
            alert("Username atau Password Salah! Silahkan Login Kembali."); document.location="login.php";</script>';
    }
} else {
    // Username tidak ditemukan, daftarkan pengguna baru
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stmt = mysqli_prepare($connection, "INSERT INTO login (username, password) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        // Pendaftaran berhasil, redirect ke halaman login
        echo '<script language="javascript">
            alert("Pendaftaran Berhasil! Anda Sekarang Terdaftar dan Login."); document.location="halaman.php";</script>';
    } else {
        // Terjadi kesalahan saat pendaftaran
        echo '<script language="javascript">
            alert("Terjadi kesalahan saat pendaftaran. Silahkan coba lagi."); document.location="login.php";</script>';
    }
}

// Menutup statement dan koneksi
mysqli_stmt_close($stmt);
mysqli_close($connection);
