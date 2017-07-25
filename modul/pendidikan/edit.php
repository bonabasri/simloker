
    <div class="row">
        <div class="col-lg-8">
            <h5 class="page-header"><small>Edit Kategori Pendidikan</small></h5>
    
            <div class="panel panel-default">
            <div class="panel-heading">Informasi Kategori Pendidikan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
            <?php 
                $getID = $_GET['id'];
                $sql = "SELECT *FROM tb_kategori_pendidikan 
                            WHERE id_pendidikan = '$getID'";
                $res = $conn->query($sql);
                $data = $res->fetch_assoc();
            ?>
                   
                <form class="" role="form" style="margin-top: 10px;" action="?p=pendidikan.action" id="defaultForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $getID; ?>">
                    <div class="form-group">
                    <label> Nama Kategori Pendidikan</label>
                        <input type="text" class="form-control" name="nama_pendidikan" value="<?php echo $data['nama_pendidikan']; ?>" required/>
                    </div>
                    
                    <div class="form-group">
                    <label></label>
                        <a class="btn btn-default" href="?p=pendidikan.view">Batal</a>
                        <input type="submit" name="update" value="Simpan" class="btn btn-primary">
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
