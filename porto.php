<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan user MySQL kamu
$pass = ""; // Kosongkan jika pakai XAMPP
$dbname = "porto_anggun"; // Nama database yang dibuat tadi

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses penyimpanan data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $pesan = htmlspecialchars($_POST['pesan']);

    $stmt = $conn->prepare("INSERT INTO webporto_db (nama, email, pesan) VALUES (?,?, ?)");
    $stmt->bind_param("sss", $nama, $email, $pesan);

    if ($stmt->execute()) {
        echo "<div class='message success'>Berhasil berlangganan!</div>";
    } else {
        echo "<div class='message error'>Gagal menyimpan data!</div>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charseet="UTF-8">
        <meta name="viewport" content="widht=device-widht, initial-scaled=1.0">
        <title>Portofolio Anggun Bastiyar</title> 
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
