<?php
  include("./API/API.php");
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_POST)){
      $send = new API();
      $nama = $send->filter($_POST['nama']);
      $email = $send->filter($_POST['email']);
      $jeniskelamin = $send->filter($_POST['jeniskelamin']);
      $isipesan = $send->filter($_POST['isipesan']);
      $send->tambahdata($nama, $email, $jeniskelamin, $isipesan);
      $send->close();
    }
  }
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Aplikasi Buku Tamu</title>
    <!-- Meta tag -->
    <meta name="description" content="Description for this site.">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
   	<!-- CSS only -->
    <link rel="stylesheet" href="./style.css"/>
  </head>
<body>
<div id="container"> 	
    <header>
      <h1>Aplikasi Buku Tamu</h1>
      <a href="/login/">Login</a>
    </header>
    <main>
      <div id="baru">
        <form id="formulir" method="POST" onsubmit="return validateform()">
          <h2>Isi Buku Tamu</h2>
          <label for="email">Email:</label>
          <input type="email" name="email" id="email" autocomplete="off" required>
          
          <label for="nama">Nama:</label>
          <input type="text" name="nama" id="nama" autocomplete="off" required>

          <label for="jeniskelamin">Jenis Kelamin:</label>
          <select name="jeniskelamin" id="jeniskelamin" required>
            <option value="male">Laki-laki</option>
            <option value="female">Perempuan</option>
          </select>

          <label for="isipesan">Isi Pesan:</label>
          <textarea name="isipesan" id="pesan" rows="4" required></textarea>

          <button id="kirimformulir" type="submit">Kirim</button>
        </form>
      </div>
      <div id="history">
      </div>
    </main>
    <footer>
      <p>
        Eric Daniel Hutabarat - UAS PEMWEB
      </p>
    </footer>
</div>
<script src="script.js" type="text/javascript"></script>
</body>
</html>