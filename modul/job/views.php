
<div class="row">
    <div class="col-lg-8">
        <h3 class="page-header"><small>Data Lowongan</small></h3>
    
<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-default" title="New Data" href="?p=job.add"><i class="fa fa-plus fa-fw"></i> New Data</a>
    <a href="?p=job.views" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="panel-body">
<div class="row">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th style="width:25%;">Perusahaan</th>
                        <th style="width:15%;">Posisi</th>
                        <th style="text-align:center;">Tanggal Post-Akhir</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $getID = $_SESSION['user_id'];
                        $sql = "SELECT *FROM tb_lowongan a
                                LEFT JOIN tb_kategori_pekerjaan b ON 
                                    (a.id_kategori_pekerjaan=b.id_kategori_kerja)
                                LEFT JOIN tb_kategori_pendidikan c ON 
                                    (a.id_pendidikan=c.id_pendidikan)
                                LEFT JOIN tb_perusahaan d ON 
                                    (a.user_id=d.user_id) 
                                ORDER BY a.id_lowongan DESC";

                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {
                            $status = $data['stat'];
                            if ($status === '0') {
                                $status = '<span class="label label-default">Belum Bayar</span>';
                            } elseif ($status === '1') {
                                $status = '<span class="label label-primary">Sudah Bayar</span>';
                            } 

                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><img src="dist/images/logo/<?php echo $data['logo'];?>" width="30" height="30"/> <?php echo $data['nama_perusahaan']; ?></td>
                        <td ><?php echo $data['posisi'];?></td>
                        <td style="text-align:center;"><?php echo date_format(date_create($data['tgl_posting']), 'd/m/Y'). ' - ' .date_format(date_create($data['tgl_akhir']), 'd/m/Y');?> </td>
                        <td ><?php echo $status;?></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-default btn-xs" title="Edit Data" href="?p=job.review&id=<?php echo $data['id_lowongan']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="?p=job.delete&id=<?php echo $data['id_lowongan']; ?>" onclick="return confirm('Apakah anda yakin menghapus data lowongan?')" class="btn btn-default btn-xs" title="Delete Data"><span class="fa fa-trash fa-fw"></span></a>
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