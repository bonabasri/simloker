<?php
	if (isset($_POST['save'])) 
	{
		$nama_pendidikan = $_POST['nama_pendidikan'];
		
		$sql = "INSERT INTO tb_kategori_pendidikan (
													nama_pendidikan)
											VALUES (
											'$nama_pendidikan') ";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("data berhasil disimpan"); </script>';
 			echo '<meta http-equiv="refresh" content="0;URL=?p=pendidikan.view">';
		}else{
			echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
		}
		$conn->close();
	}


	if (isset($_POST['update'])) 
	{
		$getId		= $_REQUEST['id'];
		$nama_pendidikan = $_POST['nama_pendidikan'];
		
		$sql = "UPDATE tb_kategori_pendidikan
					SET nama_pendidikan = '$nama_pendidikan'
					where id_pendidikan= '$getId' ";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("data berhasil disimpan"); </script>';
 			echo '<meta http-equiv="refresh" content="0;URL=?p=pendidikan.view">';
		}else{
			echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
		}
		$conn->close();
	}