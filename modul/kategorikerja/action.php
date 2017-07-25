<?php
	if (isset($_POST['save'])) 
	{
		$nama_kategori_kerja = $_POST['nama_kategori_kerja'];
		
		$sql = "INSERT INTO tb_kategori_pekerjaan (
													nama_kategori_kerja)
											VALUES (
											'$nama_kategori_kerja') ";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("data berhasil disimpan"); </script>';
 			echo '<meta http-equiv="refresh" content="0;URL=?p=kategorikerja.view">';
		}else{
			echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
		}
		$conn->close();
	}


	if (isset($_POST['update'])) 
	{
		$getId		= $_REQUEST['id'];
		$nama_kategori_kerja = $_POST['nama_kategori_kerja'];
		
		$sql = "UPDATE tb_kategori_pekerjaan 
					SET nama_kategori_kerja = '$nama_kategori_kerja'
					where id_kategori_kerja = '$getId' ";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("data berhasil disimpan"); </script>';
 			echo '<meta http-equiv="refresh" content="0;URL=?p=kategorikerja.view">';
		}else{
			echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
		}
		$conn->close();
	}