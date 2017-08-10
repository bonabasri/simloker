    <?php

	if ($_SESSION['uac'] === 'PERUSAHAAN') {
             
    	$getID = $_GET['id'];
    	$sql = "SELECT *FROM tb_lowongan a
                    LEFT JOIN tb_user b ON (a.user_id=b.user_id)
                    LEFT JOIN tb_perusahaan c ON (a.user_id=c.user_id) 
                    LEFT JOIN tb_pembayaran d ON (a.id_lowongan=d.id_lowongan)
                WHERE a.id_lowongan = '$getID'";
	            $res = $conn->query($sql);
	            foreach ($res as $row => $data);

    ?>

    <div class="row">
        <div class="col-lg-8">
            <h5 class="page-header"><small> Konfirmasi Lowongan</small></h5>

            <div class="panel panel-default">
            <div class="panel-heading">Konfirmasi Lowongan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                        <form class="" role="form" style="margin-top: 10px;" action="?p=job.action" id="defaultForm" method="post" enctype="multipart/form-data">
	                    <input type="hidden" name="id" value="<?php echo $getID?>">
	                    <input type="hidden" name="id_lowongan" value="<?php echo $data['id_lowongan']; ?>">
	                    <div class="form-group">
	                    <label> Nama Lowongan</label>
	                        <input type="text" class="form-control" name="posisi" value="<?php echo $data['posisi']; ?>">
	                    </div>
	                    <div class="form-group">
	                    <label> Nama Perusahaan</label>
	                        <input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $data['nama_perusahaan']; ?>"/>
	                    </div>
	                    <div class="form-group">
	                    <label> Upload Bukti Transfer</label>
	                            <input type="file" name="transfer" required/>
	                            <img src="dist/file/transfer/<?php echo $data['transfer'];?>" width="120" height="90"><i style="color:red;">* 
	                            File tipe .png, .jpg/jpeg</i>
	                    </div>
	                    <!-- <div class="form-group">
	                    <label> No Rekening</label>
	                        <input type="text" class="form-control" placeholder="No Rekening" name="rekening" value="<?php echo $data['rekening']; ?>" required/>
	                    </div>
	                    <div class="form-group">
	                    <label> Jumlah pembayaran</label>
	                        <input type="text" class="form-control" placeholder="Harga" name="harga" value="<?php echo $data['harga']; ?>" maxlength="5" onkeypress="return num(event)" required/>
	                    </div> -->
	                    <div class="form-group">
	                    <label></label>
	                        <a class="btn btn-default" href="?p=job.view">Batal</a>
	                        <input type="submit" name="confirm" value="Send" class="btn btn-primary">
	                    </div>                   
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<?php 
} else {
	echo " ";
	echo '<script>alert("Maaf, akses halaman ini hanya user perusahaan"); </script>';
	echo '<meta http-equiv="refresh" content="0;URL=logout.php">';
}
?>

	<script>
		function num(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
