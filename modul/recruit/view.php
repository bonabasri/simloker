
<div class="row">
    <div class="col-md-8">
        <h3 class="page-header"><small> Pelamar</small></h3>

<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-default" title="New Data" href="?p=job.add"><i class="fa fa-plus fa-fw"></i> New Data</a>
    <a href="?p=recruit.view" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="panel-body">
<div class="row">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th >Pelamar</th>
                        <th >Email</th>
                        <th style="width:15%;">Posisi</th> 
                        <th style="text-align:center;">CV</th>
                        <th style="text-align:center;">Tanggal Lamar</th>
                        <th style="text-align:center;">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $getID = $_SESSION['user_id'];
                        $sql = "SELECT *FROM tb_lamaran a 
                                left join tb_lowongan b on a.id_lowongan = b.id_lowongan
                                left join tb_pelamar c on a.user_id = c.user_id
                                left join tb_user e on c.user_id = e.user_id
                                left join tb_perusahaan d on b.user_id = d.user_id
                                WHERE b.user_id = '$getID'";

                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {

                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['nama_depan'].' '.$data['nama_belakang']; ?></td>
                        <td ><?php echo $data['email'];?></td>
                        <td ><?php echo $data['posisi'];?></td>
                        <td style="text-align:center;"><a href="dist/file/cv/<?php echo $data['file']; ?>"><?php echo $data['file'];?></a></td>
                        <td style="text-align:center;"><?php echo date_format(date_create($data['tgl_lamar']), 'd/m/Y');?> </td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-default btn-xs" title="Detail Pendaftar" data-toggle="modal" data-target="#detail<?php echo $data['no_reg']; ?>"><span class="fa fa-search fa-fw" aria-hidden="true"></span></a>
                            <a class="btn btn-default btn-xs" title="Edit Data" href="?p=job.edit&id=<?php echo $data['id_lowongan']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
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