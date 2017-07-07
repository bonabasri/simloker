	<div class="row">
        <div class="col-lg-12">
            <h5 class="page-header"> Apply for job</h5>
        </div>
    </div>
    <?php 
    	$getID = $_GET['id'];
    	$sql = "SELECT *FROM tb_lowongan 
	            INNER JOIN tb_kategori_pekerjaan ON 
	            (tb_lowongan.id_kategori_pekerjaan=tb_kategori_pekerjaan.id_kategori_kerja)
	            INNER JOIN tb_kategori_pendidikan ON 
	            (tb_lowongan.id_pendidikan=tb_kategori_pendidikan.id_pendidikan)
	            INNER JOIN tb_perusahaan ON 
	            (tb_lowongan.user_id=tb_perusahaan.user_id) WHERE tb_lowongan.id_lowongan = '$getID' ";
	            $res = $conn->query($sql);
	            foreach ($res as $row => $data) {
    ?>
    <div class="row"> 
        <div class="col-lg-8">
            <div class="panel panel-default">
            <div class="panel-heading">Informasi Lowongan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                        <form class="" role="form" style="margin-top: 10px;" action="?p=apply-save" id="defaultForm" method="post" enctype="multipart/form-data">
	                    <input type="hidden" name="id" value="<?php echo $getID?>">
	                    <div class="form-group">
	                    <label> Nama Lowongan</label>
	                        <input type="text" class="form-control" name="posisi" value="<?php echo $data['posisi']; ?>">
	                    </div>
	                    <input type="hidden" name="id_lowongan" value="<?php echo $data['id_lowongan']; ?>">
	                    <div class="form-group">
	                    <label> Upload CV</label>
	                            <input type="file" name="file" required/><br>
	                            <i>Maximum upload file size: 8 MB <br>
	                            Allowed file: .pdf, .doc, .docx</i>
	                    </div>
	                    <div class="form-group">
	                    <label></label>
	                        <a class="btn btn-default" href="?p=home">Batal</a>
	                        <input type="submit" name="apply-save" value="Apply" class="btn btn-primary">
	                    </div>                   
	                </form>
	            </div>
	        </div>
	    	</div>
		</div>
	</div>
	<?php }
	require('sidebar.php');