<?php
	$getId	 = $_REQUEST['id'];


		$sql = "DELETE FROM tb_kategori_pendidikan WHERE id_pendidikan = '".$getId."' ";

		if ($conn->query($sql)) {
			echo '<script>alert("data kategori pendidikan berhasil dihapus"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=pendidikan.view">';
		}else{
            echo '<script>alert("data gagal dihapus' .$sql. "<br>" .$conn->error. '"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=pendidikan.view">';
	}