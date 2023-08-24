<!-- koneksi database -->
<?php
include 'koneksi.php';
include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portofolio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <style>
    /* CSS Styling */
    body {
      padding-top: 0;
    }

    .card-header {
      background-color: gray;
      padding-top: 6px;
      margin-top: -20px;
    }

    .navbar {
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
      margin-top: 129px;
      margin-left: 128px;
    }

    .navbar-nav {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
  }

  .navbar-nav .nav-item {
    margin-right: 15px; /* Jarak antar menu */
  }

  .navbar-brand {
    margin-right: 30px; /* Jarak antara BagusTeknik dan menu */
  }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <h2>BagusTeknik</h2>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m1-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php"><h5>Beranda</h5></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><h5>Invoice</h5></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><h5>Penawaran</h5></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- BUTTON -->
  <a class="btn btn-primary" href="form_input.php" role="button">Add Product</a>
  <!-- FOR OUTPUT DATA(SHOWING DATA) -->
  <div class="container">
    <div class="card mt-4">
      <div class="card-header">
        Product Details
      </div>
      <div class="card-body">
        <?php
        if ($error) {
        ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
          </div>
        <?php
        }
        ?>
        <?php
        if ($sukses) {
        ?>
          <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
          </div>
        <?php
        }
        ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Code</th>
              <th scope="col">Product Name</th>
              <th scope="col">Picture</th>
              <th scope="col">Deskription</th>
              <th scope="col">Price</th>
              <th scope="col">Stock</th>
              <th scope="col">Action</th>
            </tr>
          <tbody>
            <?php
            $sql2 = "SELECT * FROM tb_produk ORDER BY id_produk DESC";
            $q2 = mysqli_query($conn, $sql2);
            $urut = 1;
            while ($r2 = mysqli_fetch_array($q2)) {
              $id_produk  = $r2['id_produk'];
              $kode       = $r2['kode'];
              $nama       = $r2['nama'];
              $foto       = $r2['foto'];
              $deskripsi  = $r2['deskripsi'];
              $harga      = $r2['harga'];
              $stok       = $r2['stok'];
            ?>
              <tr>
                <th scope="row"><?php echo $urut++; ?></th>
                <td scope="row"><?php echo $kode; ?></td>
                <td scope="row"><?php echo $nama; ?></td>
                <td scope="row"><img src="<?php echo $foto; ?>" alt="Gambar Produk"></td>
                <td scope="row"><?php echo $deskripsi; ?></td>
                <td scope="row"><?php echo $harga; ?></td>
                <td scope="row"><?php echo $stok; ?></td>
                <td scope="row">
                  <a href="form_input.php?op=edit&id_produk=<?php echo $id_produk ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                  <a href="index.php?op=delete&id_produk=<?php echo $id_produk ?>" onclick="return confirm('Konfirmasi Delete? Klik OK to Delete')"><button type="button" class="btn btn-danger">Delete</button></a>

                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
          </thead>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-d7SIp/63bTskrYYtZqJn6uWET9iRfkkUSvQnHf6JOnvcY+gCsS1d3XYH5gEvhgx" crossorigin="anonymous"></script>
</body>
<!-- END HTML -->

</html>