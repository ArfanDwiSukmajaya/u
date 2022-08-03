<?php
  if(isset($_POST['tambah'])){

    // $kode = $_POST['kode'];
    // $nama = $_POST['nama'];
    // $harga = $_POST['harga'];
    // $stok = $_POST['stok'];

    // $query = "INSERT INTO barang VALUES ('$kode', '$nama', '$harga', '$stok')";
    // mysqli_query($koneksi, $query);
    // var_dump($query);
    $data = [
      'kode_barang' => $_POST['kode'],
      'nama_barang' => $_POST['nama'],
      'harga_barang' => $_POST['harga'],
      'stok_barang' => $_POST['stok']
    ];
    create($data, 'barang', 'barang');
  }
?>


<h3>Entry Data Barang</h3>
<h3>Toko Sumber Mulya</h3>

<form action="" method="post">
    <ul>
      <li>
        <label for="kode">Kode Barang :</label>
        <input type="text" name="kode" id="kode">
      </li>
      <li>
        <label for="namabarang">Nama Barang :</label>
        <input type="text" name="nama" id="nama">
      </li>
      <li>
        <label for="hargabarang">Harga Barang :</label>
        <input type="number" name="harga" id="harga">
      </li>
      <li>
        <label for="stokbarang">Stok Barang :</label>
        <input type="number" name="stok" id="stok">
      </li>
      <li>
        <button type="submit" name="tambah">Tambah Barang</button>
      </li>
    </ul>
  </form>
