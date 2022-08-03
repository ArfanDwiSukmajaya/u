<?php
   require "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="asset/style.css">
  <title>Home</title>
</head>
<body>

  <header>
    <nav>
      <div class="logo">Sumber Mulya</div>
      <div class="link" >
        <a href="<?= "?page=barang" ?>">Barang</a>
        <a href="<?= "?page=transaksi"?>">Transaksi</a>
      </div>
    </nav>
  </header>

  <main>
    <div class="container">
      <?php
        if(isset($_GET['page'])){
          $page = $_GET['page'];
          switch ($page) {
            case 'barang':
              include "page/barang/barang.php";
              break;
            case 'tambahbarang':
              include "page/barang/tambah-barang.php";
              break;
            case 'editbarang':
              include "page/barang/edit-barang.php";
              break;
            case 'hapusbarang':
              include "page/barang/hapus-barang.php";
              break;
            case 'transaksi':
              include "page/transaksi/transaksi.php";
              break;
            case 'hapustransaksi':
              include "page/transaksi/hapus-transaksi.php";
              break;
            default:
              echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
              break;
          }
        }
      ?>
    </div>
  </main>

</body>
</html>