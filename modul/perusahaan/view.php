<?php

/**
 * PSB Online - SMK Kosgoro Nganjuk
 * ------------------------------------------------------------------------
 * @package     PSB Online
 * @author      Luqman Hakim <luckman.heckem@gmail.com>
 * @copyright   Copyright (c) 2016
 * @link        github.com/luqmanhakim1
 * ------------------------------------------------------------------------
 * Template by www.startbootstrap.com
 */

?>

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Data Perusahaan</h3>
    </div>
</div>

<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-default" title="New Data" href="?p=perusahaan.add"><i class="fa fa-plus fa-fw"></i> New Data</a>
    <a href="?p=perusahaan.view" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="row">
<div class="panel-body">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th style="width:20%;">Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th style="width:15%;">No Telepon</th> 
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;">Logo</th>               
                        <th style="text-align:center;">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM tb_perusahaan ORDER BY id_perusahaan DESC";
                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {

                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['nama_perusahaan']; ?></td>
                        <td ><?php echo $data['alamat']; ?></td>
                        <td style="text-align:center;"><?php echo $data['no_telp'];?></td>
                        <td style="text-align:center;"><?php echo $data['email'];?> & <?php echo $data['jurpil2'];?></td>
                        <td style="text-align:center;"><img src="../dist/images/logo/<?php echo $data['logo'];?>" width="35" height="35"></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-default btn-sm" title="Detail Pendaftar" data-toggle="modal" data-target="#detail<?php echo $data['no_reg']; ?>"><span class="fa fa-search fa-fw" aria-hidden="true"></span></a>
                            <a class="btn btn-default btn-sm" title="Edit Data" href="?p=perusahaan.edit&id=<?php echo $data['id_perusahaan']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
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