<?php
	if ( isset($_POST['save']) ) 
	{
		$allowExt 			= array( 'png', 'jpg' );

		$fileName 			= $_FILES['file']['name'];
		$fileExt			= strtolower(end(explode('.', $filename)));
		$fileSize			= $_FILES['file']['size'];
		$fileTemp 			= $_FILES['file']['tmp_name'];

		$v_nama_depan 		= $_POST['nama_depan'];
		$v_nama_belakang 	= $_POST['nama_belakang'];
		$v_tempat_lahir		= $_POST['tempat_lahir'];
		$v_tgl_lahir		= $_POST['tgl_lahir'];
		$v_jk				= $_POST['jk'];
		$v_agama			= $_POST['agama'];
		$v_alamat			= $_POST['alamat'];
		$v_lulusan			= $_POST['lulusan'];
		$v_usia				= $_POST['usia'];
		$v_no_hp 			= $_POST['no_hp'];
		$v_pengalaman		= $_POST['pengalaman'];
		$v_email 			= $_POST['email'];
		$v_tinggi_badan		= $_POST['tinggi_badan'];

		$v_kelebihan		= $_POST['kelebihan'];

	}
?>