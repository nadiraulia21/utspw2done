<?php
  // menghubungkan database dengan php
  $host = "localhost";
  $user = "root"; //isi username
  $pass = ""; //isi ppassword
  $db = "dapur_zahwa"; //isi nama database
  $conn = mysqli_connect("$host", "$user", "$pass", "$db");

  if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
  }
  // membuat fuungsi query dan memasukkan nilainya ke dalam variabel array
  function query($query){
      global $conn;
      $result = mysqli_query($conn, $query);
      $rows = [];
      while( $row = mysqli_fetch_assoc($result) ){
          $rows[] = $row;
      }
      return $rows;
  }

?>
