<?php
	$getId	 = $_REQUEST['id'];

 		$cek   = "SELECT * FROM tb_lowongan WHERE id_lowongan = '".$getId."' "; 
		$res    = $conn->query($cek);
		$row    = $res->fetch_array();

		$upload_dir = "dist/images/img/";
		unlink($upload_dir.$row['img']);

		$sql = "DELETE FROM tb_lowongan WHERE id_lowongan = '".$getId."' ";

		if ($conn->query($sql)) {
			echo '<script>alert("data lowongan berhasil dihapus"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
		}else{
            echo '<script>alert("data gagal dihapus' .$sql. "<br>" .$conn->error. '"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
	}
?>