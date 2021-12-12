<!doctype html>
<html lang="en">

<head>
    <title>Detail</title>
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
            object-fit: scale-down;
            height: 300px;
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

        .modal {
            padding: 50px !important;
        }

        .modal .modal-dialog {
            width: 100%;
            max-width: none;
            height: 100%;
            margin: 0;
        }

        .modal .modal-content {
            height: 100%;
            border: 0;
            border-radius: 0;
        }

        .modal .modal-body {
            overflow-y: auto;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  
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
        include './modules/delete.php';
        include './modules/update.php';

        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
        ini_set('error_reporting', E_ALL);

        $event_id = $_GET['id_buku'];
        $query = "SELECT * FROM buku_table where id=$buku_table;";
        $sql = mysqli_query($conn, $query);
        ?>

        <div class="row">
            <?php if ($row = mysqli_fetch_array($sql)) {  ?>
                <div class="col-md-12">
                    <div class="card card-home">
                        <img class="card-img-top img-poster" src="<?php echo $row['gambar'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h3><?php echo $row['judul_buku'] ?></h3>
                            <p class="card-text">
                                <p> <strong> Judul : </strong></p>
                                <p><?php echo $row['judul_buku'] ?></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p> <strong> Penulis : </strong></p>
                                        <p><?php echo $row['penulis_buku'] ?></p>
                                        
                                        <p> <strong> Tahun Terbit : </strong></p>
                                        <p><?php echo $row['tahun_terbit'] ?></p>

                                        <p> <strong> Deskripsi </strong></p>
                                        <p><?php echo $row['deskripsi'] ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p> <strong> Tag : </strong></p>

                                        <?php
                                        $fwv = json_decode($row['tag']);
                                        $isTagEmpty = true;
                                        //if array benefit is not empty
                                        if (!empty($fwv)) {
                                            $isTagEmpty = false;
                                            echo '<ul>';
                                            echo '<li>' . implode('</li><li>', $fwv) . '</li>';
                                            echo '</ul>';
                                        } else {
                                            $isTagEmpty = true;
                                            //if array benefit is empty
                                            echo '<ul>';
                                            echo '<li>' . 'Tidak Ada Bahasa.' . '</li>';
                                            echo '</ul>';
                                        }
                                        ?>

                                    </div>
                                </div>
                                <p> <strong> Bahasa : <?php echo $row['bahasa'] ?> </strong></p>

                        </div>

                        <form action="detail.php?event_id=<?php echo $row['id_buku'] ?>" method="post">
                            <div class="card-footer bg-transparent">
                                <p style="text-align: center;">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                        Edit
                                    </button>
                                    <button type="submit" value="<?php echo $row['id_buku'] ?>" name="deleteBuku" class="btn btn-danger">Hapus</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Update Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container mx-auto my-5">
                                    <form action="detail_buku.php?id_buku=<?php echo $row['id_buku'] ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6 align-items-stretch">
                                                <div class="card h-100">
                                                    <div class="card-header bg-primary"></div>
                                                    <div class="card-body">

                                                        <div class="form-group">
                                                            <label for="">Judul Buku</label>
                                                            <input required type="text" value="<?php echo $row['judul_buku'] ?>" name="judul" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Penulis</label>
                                                            <textarea required class="form-control" name="penulis" value="?>" id="" rows="3"><?php echo $row['penulis_buku'] ?>
                                                            </textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Tahun Terbit</label>
                                                            <textarea required class="form-control" name="tahun" value="?>" id="" rows="3"><?php echo $row['tahun_terbit'] ?>
                                                            </textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Deskripsi</label>
                                                            <textarea required class="form-control" name="desc" value="?>" id="" rows="3"><?php echo $row['deskripsi'] ?>
                                                            </textarea>
                                                        </div>

                                                        <div>
                                                            <label for="">Upload Gambar</label>
                                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar</small>
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="inputImg" class="custom-file-input" id="customFile">
                                                                <label class="custom-file-label" for="customFile">Choose file</label>

                                                            </div>
                                                        </div>

                                                        <div class="my-2">

                                                            <div class="">
                                                                <label class="col-md-6 form-check">
                                                                    <div class="row">
                                                                        <div class="form-check col-md-6">
                                                                            <input class="form-check-input" name="bhs" value="Indonesia" type="radio" <?php echo ($row['bahasa'] == 'Indonesia') ? 'checked' : '' ?>>
                                                                            <label class="form-check-label" for="gridRadios2">
                                                                                Indonesia
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check col-md-6">
                                                                            <input class="form-check-input" value="Lainnya" type="radio" name="bhs" <?php echo ($row['bahasa'] == 'Lainnya') ? 'checked' : '' ?>>
                                                                            <label class="form-check-label" for="gridRadios3">
                                                                                Lainnya
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                        <?php
                                                        $arrayTag = null;
                                                        $Tag = false;
                                                        $Tag = false;
                                                        $Tag = false;
                                                        $Tag = false;
                                                        $Tag = false;

                                                        if ($isTagEmpty) {
                                                            $Python = false;
                                                        } else {
                                                            $arrayTag = json_decode($row['tag']);
                                                            if (in_array("Python", $arrayTag)) {
                                                                $Python = true;
                                                            }
                                                            if (in_array("PHP", $arrayTag)) {
                                                                $PHP = true;
                                                            }
                                                            if (in_array("CSS", $arrayTag)) {
                                                                $CSS = true;
                                                            }
                                                            if (in_array("WebDev", $arrayTag))  {
                                                                $WebDev = true;
                                                            }
                                                            if (in_array("Pemrograman", $arrayTag)) {
                                                                $Pemrograman = true;
                                                            }
                                                        }
                                                        ?>

                                                        <div class="form-group">
                                                            <label for="">Tag</label>
                                                            <div class="form-check">
                                                                <div class="row col-md-10">

                                                                    <div class="col-md-4">
                                                                        <label class="form-check-label">
                                                                            <input <?php echo ($Python) ? 'checked' : ''; ?> type="checkbox" class="form-check-input" name="tag" id="" value="Python">
                                                                            Python
                                                                        </label>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label class="form-check-label">
                                                                            <input <?php echo ($CSS) ? 'checked' : ''; ?> type="checkbox" class="form-check-input" name="tag" id="" value="CSS">
                                                                            CSS
                                                                        </label>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label class="form-check-label">
                                                                            <input <?php echo ($PHP) ? 'checked' : ''; ?> type="checkbox" class="form-check-input" name="tag" id="" value="PHP">
                                                                            PHP
                                                                        </label>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label class="form-check-label">
                                                                            <input <?php echo ($WebDev) ? 'checked' : ''; ?> type="checkbox" class="form-check-input" name="tag" id="" value="WebDev">
                                                                            WebDev
                                                                        </label>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label class="form-check-label">
                                                                            <input <?php echo ($Pemrograman) ? 'checked' : ''; ?> type="checkbox" class="form-check-input" name="tag" id="" value="Pemrograman">
                                                                            Pemrograman
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                    <button type="submit" name="updateBuku" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </div>
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
        
 <a class="navbar-brand" href="#"><img src="https://drive.google.com/uc?export=view&id=1hqBNDU1Tx1RKd8wzC1bmnhwBr-7YsK23"width="100px"></a>

      </div>
         <h4 class="h-100" style="margin-top: 1px;">Perpustakaan EAD</h4>  
  <p class="text-secondary m-0">&copy Zulfa_1202194363</p></footer>

<!-- Akhir Footer -->


</html>