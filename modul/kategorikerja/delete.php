<?php
	$getId	 = $_REQUEST['id'];


		$sql = "DELETE FROM tb_kategori_pekerjaan WHERE id_kategori_kerja = '".$getId."' ";

		if ($conn->query($sql)) {
			echo '<script>alert("data kategori pekerjaan berhasil dihapus"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=kategorikerja.view">';
		}else{
            echo '<script>alert("data gagal dihapus' .$sql. "<br>" .$conn->error. '"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=kategorikerja.view">';
	}