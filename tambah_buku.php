<!doctype html>
<html lang="en">

<head>
  <title>Tambah Buku</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./assets/style/styles.css">

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script src="./assets/script.js"></script>


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
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

  <div class="container mx-auto my-5">
    <?php
    include './modules/connect.php';
    include './modules/create.php';
    ?>

    <form action="./modules/create.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-6 align-items-stretch">
          <div class="card h-100">
            <div class="card-header bg-dark" style= "color: whitesmoke;"> Tambah Data Buku</div>
            <div class="card-body">

              <div class="form-group">
                <label for="">Judul Buku</label>
                <textarea required class="form-control" name="judul_buku" id="" rows="1"></textarea>
              </div>

              <div class="form-group">
                <label for="">Penulis</label>
                <input required type="text" name="penulis_buku" id="" class="form-control" placeholder="Penulis" value="DEA_1202194365" required readonly="true" aria-describedby="helpId">
              </div>

              <div class="form-group">
                <label for="">Tahun Terbit</label>
                <textarea required class="form-control" name="tahun_terbit" id="" rows="1"></textarea>
              </div>

              <divclass="form-group">
                <label for="">Deskripsi</label>
                <textarea required class="form-control" name="deskripsi" id="" rows="3"></textarea>
              </div>

              <div class="my-2">
                <label for=""><strong>Bahasa</strong></label>
                <div class="">
                  <label class="col-md-6 form-check">
                    <div class="row">
                      <div class="form-check col-md-6">
                        <input class="form-check-input" type="radio" name="bahasa" id="gridRadios2" value="Indonesia">
                        <label class="form-check-label" for="gridRadios2">
                          Indonesia
                        </label>
                      </div>
                      <div class="form-check col-md-6">
                        <input class="form-check-input" type="radio" name="bahasa" id="gridRadios3" value="Lainnya">
                        <label class="form-check-label" for="gridRadios3">
                          Lainnya
                        </label>
                      </div>
                    </div>

                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="">Tag</label>
                <div class="form-check">
                  <div class="row col-md-10">
                    <div class="col-md-4">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="tag" id="" value="Python" checked>
                        Python
                      </label>
                    </div>

                    <div class="col-md-4">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="tag" id="" value="CSS" checked>
                        CSS
                      </label>
                    </div>

                    <div class="col-md-4">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="tag" id="" value="Pemrograman" checked>
                        Pemrograman
                      </label>
                    </div>

                    <div class="col-md-4">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="tag" id="" value="PHP" checked>
                        PHP
                      </label>
                    </div>

                    <div class="col-md-4">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="tag" id="" value="WebDev" checked>
                        WebDev
                      </label>
                    </div>

                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="">Upload Gambar</label>

                  <div class="col-md-12">
              <div class="custom-file">
                  <input type="file" name="inputImg" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
              </div>

              <div class="form-group" style="margin-top: 25px;">
                <input type="submit" name="tambah" class="btn btn-primary" value= "+TAMBAH">
              </div>

            </div>
          </div>
        </div>


            </div>
          </div>
        </div>
      </div>
    </form>

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
        
 <a class="navbar-brand" href="#"><img src="https://drive.google.com/uc?export=view&id=1hqBNDU1Tx1RKd8wzC1bmnhwBr-7YsK23"width="100px"></a>

      </div>
         <h4 class="h-100" style="margin-top: 1px;">Perpustakaan EAD</h4>  
  <p class="text-secondary m-0">&copy Dea_1202194365</p></footer>

<!-- Akhir Footer -->


</html>