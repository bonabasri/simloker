<?php

/**
 * PSB Online - SMK Kosgoro Nganjuk
 * ------------------------------------------------------------------------
 * @package     PSB Online
 * @author      Luqman Hakim <luckman.heckem@gmail.com>
 * @copyright   Copyright (c) 2016
 * @link        github.com/luqmanhakim1
 * ------------------------------------------------------------------------
 * Template by www.startbootstrap.com
 */

	// INSERT
	if (isset($_POST['insert'])){
	$usr_username = $_POST['usr_username'];
	$usr_password = md5($_POST['usr_password']);
	$usr_nama 	  = $_POST['usr_nama'];
	$usr_nip	  = $_POST['usr_nip'];
	$usr_jk		  = $_POST['usr_jk'];
	$usr_alamat   = $_POST['usr_alamat'];
	$usr_no_telp  = $_POST['usr_no_telp'];

	mysqli_query($conn, "INSERT INTO tb_user(usr_username, 
											 usr_password, 
											 usr_nama,
											 usr_nip,
											 usr_jk,
											 usr_alamat,
											 usr_no_telp) VALUES('$usr_username', 
											 					 '$usr_password', 
											 					 '$usr_nama',
											 					 '$usr_nip',
											 					 '$usr_jk',
											 					 '$usr_alamat',
											 					 '$usr_no_telp')");
	
	echo '<script> window.location="?p=users.akun"; </script>';
	exit;
	}
?>