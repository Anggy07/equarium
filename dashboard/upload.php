<?php

include '../koneksi.php';

if (isset($_POST['kirim'])) {
	$nama = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$level = mysqli_real_escape_string($conn, $_POST['level']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$insert = mysqli_query($conn, "INSERT INTO user (id, nama, email, level, username, password) VALUES (NULL, '{$nama}', '{$email}', '{$level}', '{$username}', '{$password}')");

	if ($insert) {
		header("Location: ../dashboard/?status=1");
	} else { 
		header("Location: ../dashboard/?status=2");
	}
}
?>
