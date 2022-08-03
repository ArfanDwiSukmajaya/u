<?php

  $host = "localhost";
  $user = "root";
  $pass = "root";
  $db = "db_sumber_mulya";

  $koneksi = mysqli_connect($host, $user, $pass, $db);
  if(!$koneksi){
    die("Koneksi Gagal : ".mysqli_connect_error());
  }


  function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
  }

  // Tambah Data
  function create($data, $tablename, $url){
    global $koneksi;
    $field = implode(',', array_keys($data));
    $values = "'" . implode("','", array_values($data)) . "'";
    $query = "INSERT INTO $tablename ($field) VALUES ($values)";
    $sql = mysqli_query($koneksi, $query);

    if($sql) {
        echo "Data Berhasil Disimpan";
    } else {
        echo "Gagal Menyimpan";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?page=$url'>";
  }

  function update($id, $data, $tablename, $url){
    global $koneksi;
    $id = $id;
    $data = $data;
    foreach ($data as $key => $value) {
        $field[] = $key . "='" . $value . "'";
    }
    $field = implode(',', $field);
    $query = "UPDATE $tablename SET $field WHERE kode_barang= '$id' ";

    $sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    var_dump($sql);
    if($sql) {
      echo "Data Berhasil Diubah";
    } else {
        echo "Gagal Mengubah";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?page=$url'>";
    return mysqli_affected_rows($conn);
  } 


  function delete($data, $tablename, $url, $primary){
      global $koneksi;
      $id = $data;
      $query = "DELETE FROM $tablename WHERE $primary = '$id' ";
      // var_dump($query);

      $sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

      if ($sql) {
        echo "Barang berhasil dihapus";
      } else {
          echo "Gagal menghapus";
      }
      echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?page=barang'>";
      // return mysqli_affected_rows($koneksi);
  }



?>