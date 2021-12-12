<?php
include 'connect.php';
if (isset($_POST['deleteBuku'])) {
    deleteAgenda($_POST['deleteBuku'],$conn);
}
function deleteAgenda($id_buku,$conn){
   
    $query = "DELETE FROM buku_table where id=$id_buku"; 
    $sql = mysqli_query($conn,$query);
    if ($sql) {
        echo '<br>';
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Kamu Telah Berhasil Menghapus Buku</strong> <a href="home.php">Mau Kembali ke Home?</a> .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else {
        echo '<br>';
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal Menghapus buku '.$id.' Karena '.mysqli_error($conn).'</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
}