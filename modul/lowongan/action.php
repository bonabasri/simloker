<?php
	if ( isset($_POST['save']) ) 
	{
		$v_user_id 					= $_SESSION['user_id'];
		$v_id_kategori_pekerjaan 	= $_POST['id_kategori_pekerjaan'];
		$v_id_jenis_kerja			= $_POST['id_jenis'];
		$v_posisi 					= $_POST['posisi'];
		$v_jk_require 				= $_POST['jk_require'];
		$v_usia 					= $_POST['usia'];
		$v_id_pendidikan			= $_POST['id_pendidikan'];
		$v_pengalaman				= $_POST['pengalaman'];

		$date 	        			= explode('-',$_POST['tgl_akhir']);
		$v_tgl_akhir 				= $date['2'].'-'.$date['1'].'-'.$date['0'];

		$allowExt 			= array( 'png', 'jpg', 'jpeg' );

		$fileName 			= $_FILES['img']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['img']['size'];
		$fileTemp 			= $_FILES['img']['tmp_name'];

		$upload_dir 		= "dist/images/img/";
		$img 				= basename ($fileName);
		$v_img 				= str_replace(' ','_',$img);

		$v_deskripsi				= $_POST['deskripsi'];

		if ( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				if ( move_uploaded_file( $fileTemp,$upload_dir.$v_img) ) 
				{
					$sql = "INSERT INTO tb_lowongan (
										user_id,
										id_kategori_pekerjaan,
										id_jenis,
										posisi,
										jk_require,
										usia,
										id_pendidikan,
										pengalaman,
										tgl_posting,
										tgl_akhir,
										img,
										deskripsi
										) VALUES (
												'$v_user_id',
												'$v_id_kategori_pekerjaan',
												'$v_id_jenis_kerja',
												'$v_posisi',
												'$v_jk_require',
												'$v_usia',
												'$v_id_pendidikan',
												'$v_pengalaman',
												NOW(),
												'$v_tgl_akhir',
												'$v_img',
												'$v_deskripsi' ) ";
					if ( $conn->query($sql) === TRUE ) {
						echo '<script>alert("data berhasil disimpan"); </script>';
			 			echo '<meta http-equiv="refresh" content="0;URL=?p=lowongan.view">';
					} else {
					// echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
					echo '<script>alert("data gagal disimpan disimpan"); </script>';
			 		echo '<meta http-equiv="refresh" content="0;URL=?p=lowongan.view">';
					}
				} else {
					echo '<script>alert("gagal upload file"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.add">';
				}
			} else {
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.add">';
			}
		} else {
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.add">';
		}
		$conn->close();
	}


	if ( isset($_POST['edit']) ) 
	{
		$v_id_perusahaan 			= $_SESSION['id_user'];
		$v_id_lowongan 				= $_POST['id'];
		$v_id_kategori_pekerjaan 	= $_POST['id_kategori_pekerjaan'];
		$v_id_jenis_kerja			= $_POST['id_jenis'];
		$v_posisi 					= $_POST['posisi'];
		$v_jk_require 				= $_POST['jk_require'];
		$v_usia 					= $_POST['usia'];
		$v_id_pendidikan			= $_POST['id_pendidikan'];
		$v_pengalaman				= $_POST['pengalaman'];

		$date 	        			= explode('-',$_POST['tgl_akhir']);
		$v_tgl_akhir 				= $date['2'].'-'.$date['1'].'-'.$date['0'];

		$v_deskripsi				= $_POST['deskripsi'];

		$sql = "UPDATE tb_lowongan
						SET 
							id_perusahaan 			= '$v_id_perusahaan',
							id_kategori_pekerjaan 	= '$v_id_kategori_pekerjaan',
							id_jenis 				= '$v_id_jenis_kerja',
							posisi 					= '$v_posisi',
							jk_require 				= '$v_jk_require',
							usia 					= '$v_usia',
							id_pendidikan 			= '$v_id_pendidikan',
							pengalaman 				= '$v_pengalaman',
							tgl_akhir 				= '$v_tgl_akhir',
							deskripsi 				= '$v_deskripsi'
						WHERE id_lowongan 			= '$v_id_lowongan' ";

		if ( $conn->query($sql) === TRUE ) {
			echo '<script>alert("data berhasil diubah"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=lowongan.view">';
		} else {
			// echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
			echo '<script>alert("data gagal diubah"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=lowongan.view">';
		}
	}