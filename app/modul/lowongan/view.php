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
        <h3 class="page-header">Data Lowongan</h3>
    </div>
</div>

<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-default" title="New Data" href="?p=lowongan.add"><i class="fa fa-plus fa-fw"></i> New Data</a>
    <a href="?p=data.views" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="row">
<div class="panel-body">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th style="width:15%;">ID Perusahaan</th>
                        <th>ID Kategori Pekerjaan</th>
                        <th style="width:15%;">Posisi</th> 
                        <th style="text-align:center;">Deskripsi</th>             
                        <th style="text-align:center;">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM tb_lowongan ORDER BY id_lowongan DESC";
                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {

                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['id_perusahaan']; ?></td>
                        <td ><?php echo $data['id_kategori_pekerjaan']; ?></td>
                        <td style="text-align:center;"><?php echo $data['posisi'];?></td>
                        <td style="text-align:center;"><?php echo $data['deskripsi'];?> & <?php echo $data['jurpil2'];?></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-default btn-sm" title="Detail Pendaftar" data-toggle="modal" data-target="#detail<?php echo $data['no_reg']; ?>"><span class="fa fa-search fa-fw" aria-hidden="true"></span></a>
                            <a class="btn btn-default btn-sm" title="Edit Data" href="?p=lowongan.edit&id=<?php echo $data['id_lowongan']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                            <a class="btn btn-default btn-sm" title="Konfirmasi Pendaftar" data-toggle="modal" data-target="#confirm<?php echo $data['no_reg']; ?>"><span class="fa fa-check fa-fw" aria-hidden="true"></span></a>
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