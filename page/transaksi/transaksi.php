<?php
  if(isset($_POST['submit'])){
    $stok_akhir = $_POST["stok_barang"] - $_POST['jumlah_beli'];

    $data = [
      'id_transaksi' => $_POST['id_transaksi'],
      'tanggal_transaksi' => $_POST['tgl_transaksi'],
      'kode_barang' => $_POST['kode_barang'],
      'jumlah_beli' => $_POST['jumlah_beli'],
      'stok_akhir' => $stok_akhir,
      'diskon' => $_POST['diskon_barang'],
      'total_bayar' => $_POST['total_bayar'],
    ];

    $sql = "UPDATE barang SET stok_barang=$stok_akhir WHERE kode_barang='$_POST[kode_barang]'";
    $update_stok = mysqli_query($koneksi,$sql);
    if(update_stok){
      create($data, 'transaksi', 'transaksi');
    }
    // var_dump($sql);
    // var_dump($data);
  }

  // join table barang & transaksi
  $join = "SELECT * FROM transaksi JOIN barang ON transaksi.kode_barang = barang.kode_barang";

  $transaksi = query($join);
  // var_dump($transaksi);
?>

<form action="" method="post">
    <ul>
      <li>
        <label for="id_transaksi">ID TRANSAKSI :</label>
        <input type="text" name="id_transaksi" id="id_transaksi">
      </li>
      <li>
        <label for="tgl_transaksi">Tanggal Transaksi:</label>
        <input type="datetime-local" name="tgl_transaksi" id="tgl_transaksi">
      </li>
      <p>Isi kode barang maka nama, harga, stok barang akan otomatis transliterator_list_ids</p>
      <li>
        <label for="kode_barang">Kode Barang :</label>
        <input type="text" name="kode_barang" id="kode_barang" onkeyup="GetDetail(this.value)">
      </li>
      <!-- <li>
        <button type="submit">Cari Barang</button>
      </li> -->
      <li>
        <label for="nama_barang">Nama Barang :</label>
        <input type="text" name="nama_barang" id="nama_barang">
      </li>
      <li>
        <label for="harga_barang">Harga Barang :</label>
        <input type="text" name="harga_barang" id="harga_barang">
      </li>
      <li>
        <label for="stok_barang">Stok Barang :</label>
        <input type="text" name="stok_barang" id="stok_barang">
      </li>
      <li>
        <label for="jumlah_beli">Jumlah beli :</label>
        <input type="text" name="jumlah_beli" id="jumlah_beli">
      </li>
      <li>
        <label for="diskon_barang">Diskon Barang :</label>
        <input type="text" name="diskon_barang" id="diskon_barang">
      </li>
      <li>
        <label for="total_bayar">Total Barang :</label>
        <input type="text" name="total_bayar" id="total_bayar">
      </li>
      <hr>
      <button type="submit" name="submit">Tambah transaksi</button>
    </ul>
</form>
<br>
<br>
<br>
<table border="1" width="100%"> 
  <tr>
    <th>No</th>
    <th>ID TRANSAKSI</th>
    <th>TANGGAL TRANSAKSI</th>
    <th>KODE BARANG</th>
    <th>NAMA BARANG</th>
    <th>HARGA BARANG</th>
    <th>JUMLAH BELI</th>
    <th>STOK AKHIR</th>
    <th>DISKON</th>
    <th>TOTAL BAYAR</th>
    <th>AKSI</th>
  </tr>
  <?php 
    $no = 1;
    foreach($transaksi as $row) : ?>
  <tr>
    <td><?=$no?></td>
    <td><?=$row['id_transaksi']?></td>
    <td><?=$row['tanggal_transaksi']?></td>
    <td><?=$row['kode_barang']?></td>
    <td><?=$row['nama_barang']?></td>
    <td><?=$row['harga_barang']?></td>
    <td><?=$row['jumlah_beli']?></td>
    <td><?=$row['stok_akhir']?></td>
    <td><?=$row['diskon']?></td>
    <td><?=$row['total_bayar']?></td>
    <td><a href="<?= "?page=hapustransaksi&id=$row[id_transaksi]"?>">Hapus</a></td>

  </tr>
  <?php 
    $no++;
    endforeach;
   ?>
</table>


  <script>
  
    // onkeyup event will occur when the user 
    // release the key and calls the function
    // assigned to this event
    function GetDetail(str) {
        if (str.length == 0) {
          document.getElementById("harga_barang").value = "";
          document.getElementById("nama_barang").value = "";
          document.getElementById("stok_barang").value = "";
          return;
        }
        else {

          // Creates a new XMLHttpRequest object
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {

            // Defines a function to be called when
            // the readyState property changes
            if (this.readyState == 4 && 
                    this.status == 200) {
                  
                // Typical action to be performed
                // when the document is ready
                var myObj = JSON.parse(this.responseText);

                // Returns the response data as a
                // string and store this array in
                // a variable assign the value 
                // received to first name input field
                  
                document.getElementById("nama_barang").value = myObj[0];
                  
                // Assign the value received to
                // last name input field
                document.getElementById( "harga_barang").value = myObj[1];
                document.getElementById( "stok_barang").value = myObj[2];
            }
          };
          // xhttp.open("GET", "filename", true);
             xmlhttp.open("GET", "./page/transaksi/ambil-data.php?kode_barang=" + str, true);
           // Sends the request to the server
            xmlhttp.send();
        }
    }

    // Penentuan Diskon
    let kode_barang = document.getElementById("kode_barang");
    let harga_barang = document.getElementById("harga_barang");
    let jumlah_beli = document.getElementById("jumlah_beli");
    let diskon_barang = document.getElementById("diskon_barang");
    let total_bayar = document.getElementById("total_bayar");

    jumlah_beli.addEventListener('keyup', function(){
      if(kode_barang.value === "BRG001"){
        diskon_barang.value = ((10 * parseInt(harga_barang.value)) / 100) * parseInt(jumlah_beli.value);

        total_bayar.value = parseInt(harga_barang.value) * parseInt(jumlah_beli.value) - parseInt(diskon_barang.value)
      }
    })
  </script>