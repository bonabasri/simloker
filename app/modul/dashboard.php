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
		<h3 class="page-header"><i class="fa fa-windows fa-fw"></i> Dashboard <small> Control Panel</small></h3>
	</div>
</div> 

<!-- REKAP JUMLAH PENDAFTAR -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
	                    <?php $tampil=mysqli_query($conn, "SELECT * FROM tb_biodata");
	                        $total=mysqli_num_rows($tampil); ?>
                    <div class="huge"><?php echo "$total"; ?></div>
                    <div>PENDAFTAR</div>
                    </div>
                </div>
            </div>
                        
            <a href="?p=data.views">
            	<div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading" style="background-color:#169F85;">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user-plus fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php $tampil=mysqli_query($conn, "SELECT * FROM tb_siswa");
                        	$total=mysqli_num_rows($tampil); ?>
                    <div class="huge"><?php echo "$total"; ?></div>
                    <div>DITERIMA</div>
                    </div>
                </div>
            </div>
                        
            <a href="?p=data.view-acc">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading" style="background-color:#f39c12;">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-circle-o-notch fa-spin fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php $tampil=mysqli_query($conn, "SELECT * FROM tb_biodata WHERE status=''");
                        	$total=mysqli_num_rows($tampil); ?>
                    <div class="huge"><?php echo "$total"; ?></div>
                    <div>MENUNGGU</div>
                    </div>
                </div>
            </div>
                        
            <a href="?p=data.views">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading" style="background-color:#d43f3a;">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user-times fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php $tampil=mysqli_query($conn, "SELECT * FROM tb_biodata WHERE status='DITOLAK'");
                        	$total=mysqli_num_rows($tampil); ?>
                    <div class="huge"><?php echo "$total"; ?></div>
                    <div>DITOLAK</div>
                    </div>
                </div>
            </div>
                        
            <a href="?p=data.views">
            	<div class="panel-footer">
                	<span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
<!-- PENDAFTAR BARU -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#FAFAFA;"> PENDAFTAR BARU
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <?php $tampil=mysqli_query($conn, "SELECT * FROM tb_biodata ORDER BY id_daftar DESC limit 4");
                        while($data=mysqli_fetch_assoc($tampil)){
                    ?>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-user fa-fw"></i>&nbsp; <?php echo $data['nama']; ?>
                        <div class="pull-right">
                            <span class="label label-primary"><em><?php echo date_format(date_create($data['tgl_daftar']), 'd-m-Y H:i:s'); ?></em>
                            </span>
                        </div>
                    </a>
                    <?php } ?>
                </div>
                <div class="pull-right">
                    <a href="?p=data.views" class="btn btn-primary">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

<!-- INFORMASI AKADEMIK & JURUSAN -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#FAFAFA;"> DATA AKADEMIK
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <?php 
                        $tampil=mysqli_query($conn, "SELECT * FROM tb_jurusan ORDER BY jur_id ASC limit 3");
                        while($data=mysqli_fetch_assoc($tampil)){
                    ?>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-globe fa-fw"></i> <?php echo $data['jur_ket']; ?>
                        <div class="pull-right">
                            <span class="label label-success" style="background-color:#169F85;">Akreditasi <?php echo $data['jur_akre']; ?>
                            </span>
                        </div>
                    </a>
                    <?php } ?>
                </div>
                <div class="list-group">
                    <?php
                        $view = mysqli_query($conn, "SELECT *FROM tb_tahunajaran WHERE ta_status='Aktif'");
                        $row = mysqli_fetch_assoc($view);
                    ?>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-mortar-board fa-fw"></i> TAHUN AJARAN <?php echo $row['ta_tahunajaran']; ?>
                        <div class="pull-right">
                        <span class="label label-success" style="background-color:#169F85;">Kuota : <?php echo $row['ta_kuota'];?>
                        </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
