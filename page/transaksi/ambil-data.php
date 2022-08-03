<?php
  // Get the user id
  $kode_barang = $_REQUEST['kode_barang'];

  // Database connection
  $con = mysqli_connect("localhost", "root", "root", "db_sumber_mulya");

  if ($kode_barang !== "") {
    
    // Get corresponding first name and
    // last name for that user id	
    $query = mysqli_query($con, "SELECT * FROM barang WHERE kode_barang='$kode_barang'");


    $row = mysqli_fetch_array($query);

    // Get the first name
    $nama_barang = $row["nama_barang"];

    // Get the first name
    $harga_barang = $row["harga_barang"];
    $stok_barang = $row["stok_barang"];
  }

  // Store it in a array
  $result = array("$nama_barang", "$harga_barang", "$stok_barang");

  // Send in JSON encoded form
  $myJSON = json_encode($result);
  echo $myJSON;
?>