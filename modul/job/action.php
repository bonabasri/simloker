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
			 			echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
					} else {
					// echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
					echo '<script>alert("data gagal disimpan disimpan"); </script>';
			 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.add">';
					}
				} else {
					echo '<script>alert("gagal upload file"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=job.add">';
				}
			} else {
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=job.add">';
			}
		} else {
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=job.add">';
		}
		$conn->close();
	}


	if ( isset($_POST['edit']) ) 
	{
		$getId		= $_REQUEST['id'];
		// $v_user_id	= $_POST['user_id'];
		$cek 	  	= "SELECT * FROM tb_lowongan WHERE id_lowongan = '".$getId."' "; 
		$res    	= $conn->query($cek);
		$data   	= $res->fetch_array();

		// $v_id_perusahaan 			= $_SESSION['id_user'];
		$v_id_lowongan 				= $_POST['id_lowongan'];
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

		if ( empty($fileTemp) ) 
		{
			$sql = "UPDATE tb_lowongan
							SET 
								id_kategori_pekerjaan 	= '$v_id_kategori_pekerjaan',
								id_jenis 				= '$v_id_jenis_kerja',
								posisi 					= '$v_posisi',
								jk_require 				= '$v_jk_require',
								usia 					= '$v_usia',
								id_pendidikan 			= '$v_id_pendidikan',
								pengalaman 				= '$v_pengalaman',
								tgl_akhir 				= '$v_tgl_akhir',
								deskripsi 				= '$v_deskripsi'
							WHERE id_lowongan 			= '".$getId."' ";

			if ( $conn->query($sql) === TRUE ) {
				echo '<script>alert("data berhasil diubah"); </script>';
		 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
			} else {
				// echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
				echo '<script>alert("data gagal diubah"); </script>';
		 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
			}
		}
		// jika foto diubah
		else if( !empty($fileTemp) ) 
		{

		if ( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				if ( move_uploaded_file( $fileTemp,$upload_dir.$v_img) ) 
				{
					unlink($upload_dir.$data['img']);

					$sql = "UPDATE tb_lowongan
							SET 
								id_kategori_pekerjaan 	= '$v_id_kategori_pekerjaan',
								id_jenis 				= '$v_id_jenis_kerja',
								posisi 					= '$v_posisi',
								jk_require 				= '$v_jk_require',
								usia 					= '$v_usia',
								id_pendidikan 			= '$v_id_pendidikan',
								pengalaman 				= '$v_pengalaman',
								tgl_akhir 				= '$v_tgl_akhir',
								img 					= '$v_img',
								deskripsi 				= '$v_deskripsi'
							WHERE id_lowongan 			= '".$getId."' ";

					if ( $conn->query($sql) === TRUE ) {
						echo '<script>alert("data berhasil diubah"); </script>';
				 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
					} else {
						// echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
						echo '<script>alert("data gagal diubah"); </script>';
				 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
					}
				} else {
					echo '<script>alert("gagal upload file"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
				}
			} else {
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
			}
		} else {
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
			}
		}
		$conn->close();
	}