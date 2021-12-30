<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">PENGAJUAN BERKAS BARU</h4></center>
                    </div>
                    <div class="card-body">
                        <!-- TABEL BERKAS BARU START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th><center>No</center></th>
                                        <th><center>Nomor Dokumen</center></th>
                                        <th><center>OPD</center></th>
                                        <th><center>Tanggal Dokumen</center></th>
                                        <th><center>Jumlah Berkas</center></th>
                                        <th><center>Status</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($getAll as $gt):?>
                                        <tr>
                                            <td><center><?=$no++;?></center></td>
                                            <td><center><?=$gt["OVDOCNO"];?></center></td>
                                            <td><?=$gt["BNDESB1"];?></td>
                                            <td><center><?= date('d-m-Y', strtotime($gt["OVDOCDT"])); ?></center></td>
                                            <td><center><?=$gt["total_berkas"];?></center></td>
                                            
                                            <?php if($gt["OVPOST"] == "0" || $gt["OVPOST"] == NULL) {?>
                                                <td><center>
                                                    <a href="<?=base_url()?>BerkasBaru/Approval/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>"><span class="badge badge-warning"><?=$gt["draft"];?></span></a>
                                                    </center>
                                                </td>
                                                <td><center>
                                                    <!-- DETAIL -->
                                                    <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                                    <!-- SERAHKAN -->
                                                    <a href="<?=base_url()?>BerkasBaru/Approval/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>"><span class="badge badge-success"><i class="fa fa-file-export" aria-hidden="true"></i></span></a>

                                                    </center>
                                                </td>
                                            <?php } else if($gt["OVPOST"] == "1") {?>
                                                <td><center>
                                                    <a href="<?=base_url()?>BerkasBaru/Acc/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>"><span class="badge badge-warning"><?=$gt["approval"];?></span></a>
                                                    </center>
                                                </td>
                                                <td><center>
                                                    <!-- DETAIL -->
                                                    <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                                    
                                                    <!-- LIHAT DOKUMEN -->
                                                    <a href="#" class="pd-setting-ed"><span class="badge badge-secondary" title="Lihat Dokumen"><i class="fa fa-file" aria-hidden="true"></i></span></a>

                                                    <!-- ACC -->
                                                    <a href="<?=base_url()?>BerkasBaru/Verifikasi_pengajuan/<?=$gt["OVDOCNO"];?>" style="color:#000000;"><span class="badge badge-success" title="Verifikasi Pengajuan"><i class="fa fa-check" aria-hidden="true"></i></span></a>

                                                    <!-- REVISI -->
                                                    <a href="<?=base_url()?>BerkasBaru/revisi_pengajuan/<?=$gt["OVDOCNO"];?>" style="color:#000000;"><span class="badge badge-danger" title="Revisi"><i class="fa fa-times" aria-hidden="true"></i></span></a>
                                                    </center>
                                                </td>
                                            <?php } else if($gt["OVPOST"] == "3") {?>
                                                <td><center>
                                                    <span class="badge badge-warning"><?=$gt["verifikasi_pengajuan"];?></span>
                                                    </center>
                                                </td>
                                                <td><center>
                                                    <!-- DETAIL -->
                                                    <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                                    <!-- CETAK DOKUMEN -->
                                                    <a href="#" class="pd-setting-ed" style="color:#000000;" title="Cetak Berita Acara"><span class="badge badge-primary"><i class="fa fa-print" aria-hidden="true"></i></span></a>

                                                    <!-- ACC -->
                                                    <a  href="<?=base_url()?>BerkasBaru/Acc/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>" style="color:#000000;" title="Setujui"><span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></span></a>
                                                </td>
                                            <?php } else if($gt["OVPOST"] == "11") {?>
                                                <td><center>
                                                    <a href="#"><span class="badge badge-success"><?=$gt["finish"];?></span></a>
                                                </td>
                                                <td><center>
                                                    <!-- DETAIL -->
                                                    <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                                    </center>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- TABEL BERKAS BARU END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

