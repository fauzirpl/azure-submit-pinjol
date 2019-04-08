<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "koneksi.php";
    $nik = $_POST['inputNIK'];
    $nama = $_POST['inputName'];
    $email = $_POST['inputEmail'];
    $pinjaman = $_POST['selectPinjaman'];
    if (empty($nik) || empty($nama) || empty($email) || empty($pinjaman)) {
        $_SESSION['status'] = "Inputan tidak boleh kosong";
        header("Location: index.php");
    }
    try {
        $sql = "INSERT INTO tbl_pinjaman (nik, nama, email, pinjaman)
        VALUES ('$nik', '$nama', '$email', '$pinjaman')";
        // use exec() because no results are returned
        $conn->exec($sql);
        header("Location: show.php");
        //echo "Data berhasil masuk ke Database";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
} else {
    echo "Apa yang anda lakukan disini?";
}

?>