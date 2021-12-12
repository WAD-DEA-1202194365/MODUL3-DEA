<?php

$nowDate = time();
if (isset($_POST['tambah'])) {
  $judul = $_POST['judul_buku'];
  $penulis = $_POST['penulis_buku'];
  $tahun = $_POST['tahun_terbit'];
  $deskripsi = $_POST['deskripsi'];
  $bahasa = $_POST['bahasa'];
  $tag = json_encode($_POST['tag']);

  $fileIMG = $_FILES['inputImg'];
  $fileIMGName = $_FILES['inputImg']['name'];
  $fileIMGType = $_FILES['inputImg']['type'];
  $fileIMGSize = $_FILES['inputImg']['size'];
  $fileIMGTempLoc = $_FILES['inputImg']['tmp_name'];

  $filePathLocal = "./assets/img/";
  $saveLocal =  move_uploaded_file($fileIMGTempLoc, $filePathLocal);


  $query = "INSERT INTO `buku_table`
    (`judul_buku`, `penulis_buku`, `tahun_terbit`,
     `deskripsi`, `bahasa`, `tag`,`gambar`)
    VALUES ('$judul','$penulis','$tahun','$deskripsi','$bahasa','$fileIMG','$tag')";
echo var_dump($query);
  $sql = mysqli_query($connect, $query);
  echo var_dump($sql);

}