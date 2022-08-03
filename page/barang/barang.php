<?php

  $barang = query("SELECT * FROM barang");


?>

<center>
<h3>Daftar Barang</h3>
<h3>Toko Sumber Mulya</h3>
</center>

<a href="<?= "?page=tambahbarang"?>">Tambah Barang</a>

<br>
<br>

<table border="1" width="100%">
  <tr>
    <th>No</th>
    <th>Kode Barang</th>
    <th>Harga Barang</th>
    <th>Stok Barang</th>
    <th>Aksi</th>
  </tr>
  <?php $i = 1; ?>
  <?php foreach($barang as $b) : ?>
  <tr>
    <td><?= $i ?></td>
    <td><?= $b["kode_barang"]; ?></td>
    <td><?= $b["nama_barang"]; ?></td>
    <td><?= $b["harga_barang"]; ?></td>
    <td><?= $b["stok_barang"]; ?></td>
    <td>
      <a href="<?= "?page=editbarang&id=$b[kode_barang]" ?>">Edit</a> | 
      <a href="<?= "?page=hapusbarang&id=$b[kode_barang]" ?>" onclick="return confirm('yakin?')">Hapus</a>
    </td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>
</table>