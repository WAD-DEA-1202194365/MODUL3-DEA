<!doctype html>
<html lang="en">

<head>
  <title>Home</title>
  <!-- Required meta tags -->


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./assets/style/styles.css">

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script src="./assets/script.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .fax {
      color: orange;
      margin-right: 12px;
    }

    .img-poster {
      object-fit: cover;
      height: 170px;
      display: block;
      position: relative;
      overflow: hidden;
      border-radius: 20px;
      box-shadow: 0 0 25px #3d2173a1;
      transition: all ease 1s;
    }

    .card-home {
      margin: 20px;
    }
  </style>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body> 
  <section id="Home"> 
<!--- Awal Navbar --->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="Home.php"><img src="https://drive.google.com/uc?export=view&id=1hqBNDU1Tx1RKd8wzC1bmnhwBr-7YsK23"width="100px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse row" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto col-lg-12">
        <li class="nav-item col-lg-9">
        </li>
        <li class="nav-item  text-light">
          <a class="nav-link text-light" href="tambah_buku.php"> <button type="button" class="btn btn-primary">Tambah Buku</button></a>
        </li>
      </ul>
    </div>
  </nav>
<!--- Akhir Navbar --->

  <div class="container"> 
    <?php
    include './modules/connect.php';
    include './modules/create.php';

    $query = "SELECT * FROM buku_table";
    $sql = mysqli_query($connect, $query);

    ?>

    <?php
    if (mysqli_num_rows($sql) == 0) { ?>
      <center> <h1 class="h-100" style="margin-top: 200px;">BELUM ADA BUKU! <hr style="background-color:black;"></h1> </center>
      <div class=" d-flex justify-content-center align-items-center">
        
        <h4 class="h-100" style="margin-top: 1px;">Silahkan menambahkan buku terlebih dahulu.</h4>  
      </div>
      

    <?php } ?>
    <div class="row">
      <?php while ($row = mysqli_fetch_array($sql)) {  ?>
        <div class="col-md-4">
          <div class="card card-home">
            <img class="card-img-top img-poster" src="<?php echo $row['gambar'] ?>" alt="<?php echo $row['gambar'] ?>">

              <div class="card-body"> 
              <h3><?php echo $row['judul_buku'] ?></h3>
              <p class="card-text">
                <p>Penulis : <?php echo $row['penulis_buku'] ?></p>
                <p>Tahun Terbit : <?php echo $row['tahun_terbit'] ?></p>
                <p>Deskripsi : <?php echo $row['deskripsi'] ?></p>
              </div>
        
            <div class="card-footer bg-transparent ">
              <a href="detail_buku.php?id_buku=<?php echo $row['id_buku'] ?>">
            
                <p style="text-align: end;"><button type="button" class="btn btn-primary">Lihat Detail</button></p>
              </a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
    
  

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>
  
<!-- Footer -->

<footer class="bg-light py-2 text-center">
      <div class=" d-flex justify-content-center align-items-center">
        
 <a class="navbar-brand" href="#"><img src="https://drive.google.com/uc?export=view&id=1hqBNDU1Tx1RKd8wzC1bmnhwBr-7YsK23" style="width: 125px; height: 45px; margin-top: 150px;"></a>

      </div>
         <h4 class="h-100" style="margin-top: 1px;">Perpustakaan EAD</h4>  
  <p class="text-secondary m-0">&copy Dea_1202194365</p></footer>

<!-- Akhir Footer -->

</html>