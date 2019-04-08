<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=db_pinjol", $username, $password);
    // set mode error PDO ke exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Koneksi Berhasil";
    }
catch(PDOException $e)
    {
    echo "Koneksi Gagal : " . $e->getMessage();
    }
?> 