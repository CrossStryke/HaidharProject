<?php
include 'config.php';

if(isset($_POST['submit'])){

    $nama = $_POST['nama'];
    $tarikh = $_POST['tarikh'];
    $masamasuk  = $_POST['masamasuk'];
    $masakeluar =  $_POST['masakeluar'];
    $email = $_POST['email'];
    $noTel = $_POST['noTel'];

    $query = "INSERT INTO pelajar (nama, tarikh, masamasuk, masakeluar, email,  noTel) VALUES ('$nama', '$tarikh', '$masamasuk', 
  '$masakeluar', '$email', '$noTel')";

  $data = mysqli_query($connect, $query);
  echo "<script>alert('Rekod berjaya disimpan');
  window.location='admin/index.php'</script>";
}
        echo "<script>alert('Tambah maklumat berjaya');
             window.location='admin/index.php'</script>";
?>

