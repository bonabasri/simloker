
<div class="row">
    <div class="col-lg-8">
        <h3 class="page-header"><small>Data Lowongan</small></h3>
    
<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-default" title="New Data" href="?p=job.add"><i class="fa fa-plus fa-fw"></i> New Data</a>
    <a href="?p=job.view" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="panel-body">
<div class="row">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th style="width:15%;">Perusahaan</th>
                        <th>Kategori Kerja</th>
                        <th style="width:15%;">Posisi</th>
                        <th style="text-align:center;">Ket Gambar</th>
                        <th style="text-align:center;">Tanggal Post/Akhir</th>
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

                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['nama_perusahaan']; ?></td>
                        <td ><?php echo $data['nama_kategori_kerja']; ?></td>
                        <td ><?php echo $data['posisi'];?></td>
                        <td style="text-align:center;"><img src="dist/images/img/<?php echo $data['img'];?> " width="30" height="30"/></td>
                        <td style="text-align:center;"><?php echo date_format(date_create($data['tgl_posting']), 'd/m/Y'). ' - ' .date_format(date_create($data['tgl_akhir']), 'd/m/Y');?> </td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-default btn-xs" title="Detail Pendaftar" data-toggle="modal" data-target="#detail<?php echo $data['no_reg']; ?>"><span class="fa fa-search fa-fw" aria-hidden="true"></span></a>
                            <a class="btn btn-default btn-xs" title="Edit Data" href="?p=job.edit&id=<?php echo $data['id_lowongan']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="?p=job.delete&id=<?php echo $data['id_lowongan']; ?>" onclick="return confirm('Apakah anda yakin menghapus data lowongan?')" class="btn btn-default btn-sm" title="Delete Data"><span class="fa fa-trash fa-fw"></span></a>
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