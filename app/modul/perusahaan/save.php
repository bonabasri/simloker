<?php
	if ( isset($_POST['save']) ) 
	{
		$allowExt 			= array( 'png', 'jpg', 'jpeg' );

		$fileName 			= $_FILES['logo']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['logo']['size'];
		$fileTemp 			= $_FILES['logo']['tmp_name'];

		$v_nama_perusahaan 	= $_POST['nama_perusahaan'];
		$v_alamat			= $_POST['alamat'];
		$v_kota				= $_POST['kota'];
		$v_prov				= $_POST['prov'];
		$v_no_telp			= $_POST['no_telp'];
		$v_email			= $_POST['email'];

		$v_ket_perusahaan	= $_POST['ket_perusahaan'];

		$upload_dir 		= "../dist/images/logo/";
		$file 				= basename ($fileName);
		$v_file 			= str_replace(' ','_',$file);

		if ( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				if ( move_uploaded_file( $fileTemp,$upload_dir.$v_file) ) 
				{
					$sql = "INSERT INTO tb_perusahaan 
										(
										nama_perusahaan, 
										alamat, 
										kota, 
										prov, 
										no_telp,
										email,
										logo,
										ket_perusahaan,
										tgl_daftar) VALUES 
												(
												'$v_nama_perusahaan',
												'$v_alamat',
												'$v_kota',
												'$v_prov',
												'$v_no_telp',
												'$v_email',
												'$v_file',
												'$v_ket_perusahaan',
												NOW()
												)";

					if ( $conn->query($sql) === TRUE ) {
						echo "berhasil simpan";
					} else {
						echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
					}
				} else {
					echo 'gagal upload file';
				}
			} else {
				echo 'ukuran file maks 1 mb';
			}
		} else {
			echo 'ekstensi file tidak diijinkan';
		}

	}
