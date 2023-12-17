<?php
	include('../API/API.php');
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
	}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Login</title>
    <!-- Meta tag -->
    <meta name="description" content="Description for this site.">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
   	<!-- CSS only -->
    <link rel="stylesheet" href="../style.css"/>
  </head>
<body>
<div id="container"> 	
    <header>
      <h1>Aplikasi Buku Tamu</h1>
    </header>
 	<main id="login">
 		<h2>Login</h2>
 			<form id="formulir" action="" method="POST">
 				<label for="user">Username:</label>
 				<input type="text" name="user" autocomplete="off" required>
 				<label for="pass">Password:</label>
 				<input type="password" name="pass" autocomplete="off" required>
 				<button>Login</button>
 			</form>
 	</main>
    <footer>
      <p>
        Eric Daniel Hutabarat - UAS PEMWEB
      </p>
    </footer>
</div>
</body>
</html>