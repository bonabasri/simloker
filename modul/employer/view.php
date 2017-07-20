
<div class="row">
    <div class="col-md-8">
        <h3 class="page-header"><small>Data Perusahaan</small></h3>

<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-default" title="New Data" href="?p=employer.add"><i class="fa fa-plus fa-fw"></i> New Data</a>
    <a href="?p=employer.view" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="panel-body">
<div class="row">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th>No</th>
                        <th style="width:5%;">Username</th>
                        <th style="width:30%;">Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th style="width:15%;">Telepon</th> 
                        <th style="text-align:center;">Email</th>              
                        <th style="text-align:center;">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM tb_perusahaan a
                                INNER JOIN tb_user b ON a.user_id = b.user_id
                                ORDER BY b.user_id DESC";
                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {

                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['user_id']; ?></td>
                        <td ><img src="dist/images/logo/<?php echo $data['logo'];?>" width="30" height="30"> <?php echo $data['nama_perusahaan']; ?></td>
                        <td ><?php echo $data['alamat']; ?></td>
                        <td ><?php echo $data['no_telp'];?></td>
                        <td ><?php echo $data['email'];?></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-default btn-xs" title="Edit Data" href="?p=employer.edit&user_id=<?php echo $data['user_id']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                            <!-- <a href="?p=perusahaan.delete&id=<?php echo $data['id_perusahaan']; ?>" onclick="return confirm('Apakah anda yakin menghapus data <?php echo $data['nama_perusahaan']; ?>')" class="btn btn-default btn-sm" title="Delete Data"><span class="fa fa-trash fa-fw"></span></a> -->

                        </div>

                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>    
            </table>
        </div>
    </div>
</div>
</div>
</div>