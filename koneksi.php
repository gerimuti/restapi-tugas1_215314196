<?php
// Menonaktifkan error reporting (jika perlu)
error_reporting(0);

// Memulai sesi
session_start();

// Informasi koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$databasename = "restapinew";

// Membuat koneksi menggunakan MySQLi
$connection = mysqli_connect($host, $username, $password, $databasename);
// $connection = mysqli_connect($host, $id, $label, $status, $createdate, $databasename);

// Mengecek apakah koneksi berhasil
if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
