<?php
	$getId	 = $_GET['id'];

 		$cek   = "SELECT * FROM tb_lamaran WHERE user_id = '".$getId."' "; 
		$res    = $conn->query($cek);
		$row    = $res->fetch_array();

		$upload_dir = "dist/files/cv/";
		unlink($upload_dir.$row['file']);

		$sql = "DELETE FROM tb_lamaran WHERE user_id = '".$getId."' ";

		if ($conn->query($sql)) {
			echo '<script>alert("data lamaran berhasil dihapus"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=resume.view">';
		}else{
            echo '<script>alert("data gagal dihapus' .$sql. "<br>" .$conn->error. '"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=resume.view">';
	}
?>