<?php
	if (isset($_POST['save'])) 
	{
		$v_id_kategori_pekerjaan 	= $_POST['id_kategori_pekerjaan'];
		$v_posisi 					= $_POST['posisi'];
		$v_jk_require 				= $_POST['jk_require'];
		$v_usia 					= $_POST['usia'];
		$v_id_pendidikan			= $_POST['id_pendidikan'];
		$v_pengalaman				= $_POST['pengalaman'];
		$v_tgl_akhir				= $_POST['tgl_akhir'];
		$v_deskripsi				= $_POST['deskripsi'];


		$sql = "INSERT INTO tb_lowongan (
										id_kategori_pekerjaan,
										posisi,
										jk_require,
										usia,
										id_pendidikan,
										pengalaman,
										tgl_posting,
										tgl_akhir,
										deskripsi
										) VALUES ( 
												'$v_id_kategori_pekerjaan',
												'$v_posisi',
												'$v_jk_require',
												'$v_usia',
												'$v_id_pendidikan',
												'$v_pengalaman',
												NOW(),
												'$v_tgl_akhir',
												'$v_deskripsi' ) ";
		if ( $conn->query($sql) === TRUE ) {
						echo "berhasil simpan";
					} else {
						echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
					}

	}
?>