<?php

  $barang = query("SELECT * FROM barang WHERE kode_barang = '$_GET[id]'")[0];

  // var_dump($_GET['id']);

  if(isset($_POST['tambah'])){
    $id = $_POST['kode'];

    $data = [
      'kode_barang' => $_POST['kode'],
      'nama_barang' => $_POST['nama'],
      'harga_barang' => $_POST['harga'],
      'stok_barang' => $_POST['stok']
    ];
    update($id, $data, 'barang', 'barang');
  }
?>


<h3>Edit Data Barang</h3>
<h3>Toko Sumber Mulya</h3>

<form action="" method="post">
    <ul>
      <li>
        <label for="kode">Kode Barang :</label>
        <input type="text" name="kode" id="kode" value="<?= "$barang[kode_barang]"; ?>">
      </li>
      <li>
        <label for="namabarang">Nama Barang :</label>
        <input type="text" name="nama" id="nama" value="<?= "$barang[nama_barang]" ?>">
      </li>
      <li>
        <label for="hargabarang">Harga Barang :</label>
        <input type="number" name="harga" id="harga" value="<?= "$barang[harga_barang]"; ?>">
      </li>
      <li>
        <label for="stokbarang">Stok Barang :</label>
        <input type="number" name="stok" id="stok" value="<?= "$barang[stok_barang]"; ?>">
      </li>
      <li>
        <button type="submit" name="tambah">Edit Barang</button>
      </li>
    </ul>
  </form>
