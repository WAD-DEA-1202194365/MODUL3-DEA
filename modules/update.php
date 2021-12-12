<?php

$nowDate = time();
if (isset($_POST['updateBuku'])) {
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis_buku'];
    $tahun = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];
    $bahasa = $_POST['bahasa'];
    $tag = json_encode($_POST['tag']);
    $id = $_POST['id_buku'];


    echo $judul ;
    echo "<br>";
    echo $penulis ;
    echo "<br>";
    echo $tahun ;
    echo "<br>";
    echo $deskripsi ;
    echo "<br>";
    echo $bahasa ;
    echo "<br>";
    echo $tag ;
    echo "<br>";
    echo $id ;

    $query = "";
        $fileIMG = $_FILES['inputImg'];
        $fileIMGName = $_FILES['inputImg']['name'];
        $fileIMGTempLoc = $_FILES['inputImg']['tmp_name'];
        $query = "UPDATE `buku_table` SET 
    `judul_buku`='$judul',
    `penulis_buku`='$penulis',
    `tahun_terbit`='$tahun',
    `deskripsi`='$deskripsi',
    `bahasa`='$bahasa',
    `gambar`='$filePathLocal',
    `tag`='$tag' WHERE `id_buku`= '$id'";
        // $filePath = "$fileIMGName.png";
        // $saveLocal =  move_uploaded_file($fileIMGTempLoc, $filePath);

     echo "<br>";
    echo $query;

    $sql = mysqli_query($conn, $query);
    if ($sql) {
        echo 'Berhasil ditambah';
    } else {
        echo 'Gagal menambahkan karena' . $mysqli_error($conn);
    }
} else {
    
}
