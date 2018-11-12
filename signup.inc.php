<?php

	require 'conectare.php';

	if(!empty($_POST["nume"]) && !empty($_POST["prenume"]) && !empty($_POST["username"]) && !empty($_POST["password"]) && isset($_POST['nume']) && isset($_POST['prenume']) && isset($_POST['username']) && isset($_POST['password'])){
		$nume = $_POST["nume"];
		$prenume = $_POST["prenume"];
		$username = $_POST["username"];
		$password = $_POST["password"];


		$sql = "SELECT u_username FROM utilizatori WHERE u_username='$username'";
		$result = mysqli_query($conectare, $sql);
		$check = mysqli_num_rows($result);

		if(check > 0){
			header("Location: login.php?info=exista");
			die();
		}else{
			$sql = "INSERT INTO utilizatori (u_nume, u_prenume, u_username, u_password) VALUES ('$nume', '$prenume', '$username', md5('$password'))";
			$result = mysqli_query($conectare, $sql);

			header("Location: login.php?info=ok");
		}
		
	} else{
		header("Location: login.php?info=eroare");
	}
	
