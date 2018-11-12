<?php
	session_start();
	require 'conectare.php';

	if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];


		$parola = "SELECT * FROM utilizatori WHERE u_username='$username'";
		$result = mysqli_query($conectare, $parola);
		$row = $result->fetch_assoc();
		$par = $row['u_password'];

		//if($username == 'admin' && $par == md5($_POST['password'])){
		//	header("Location: add_product.php");
		//}else
		if($par != md5($_POST['password'])){
			header("Location: login.php?info=eroare_conectare");
			die();
		}else{
			header("Location: index.php?info=conectat");

			$_SESSION['id'] = $row['u_id'];
			$_SESSION['nume'] = $row['u_nume'];
			$_SESSION['prenume'] = $row['u_prenume'];
			$_SESSION['username'] = $row['u_username'];
			
			
		}

	
	}


