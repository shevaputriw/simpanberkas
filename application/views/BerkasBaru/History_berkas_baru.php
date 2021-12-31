<?php if($this->session->userdata('SCUSG') == "BPKAD" || $this->session->userdata('SCUSG') == "Administrator") {?>
    <div class="content-body btn-page" style="margin-top:-4%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <center><h4 class="card-title">HISTORY PENGAJUAN BERKAS BARU</h4></center>
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
                                            <th><center>Aksi<center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($history_bpkad as $gt1):?>
                                            <tr>
                                                <td><center><?=$no++;?></center></td>
                                                <td><center><?=$gt1["OVDOCNO"];?></center></td>
                                                <td><center><?=$gt1["BNDESB1"];?></center></td>
                                                <td><center><?= date('d-m-Y', strtotime($gt1["OVDOCDT"])); ?></center></td>
                                                <td><center><?=$gt1["total_berkas"];?></center></td>
                                                
                                                <?php if($gt1["OVPOST"] == "0" || $gt1["OVPOST"] == NULL) {?>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Approval/<?=$gt1["OVIDBUID"];?>/<?=$gt1["OVDOCNO"];?>/<?=$gt1["OVDOCTY"];?>"><span class="badge badge-warning"><?=$gt1["draft"];?></span></a>
                                                        </center>
                                                    </td>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt1['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><span class="badge badge-secondary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat</span></a>
                                                        <a href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt1["OVIDBUID"];?>/<?=$gt1["OVDOCNO"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print"></i> &nbsp;Print</span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gt1["OVPOST"] == "1") {?>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Acc/<?=$gt1["OVIDBUID"];?>/<?=$gt1["OVDOCNO"];?>/<?=$gt1["OVDOCTY"];?>"><span class="badge badge-warning"><?=$gt1["approval"];?></span></a>
                                                        </center>
                                                    </td>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt1['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><span class="badge badge-secondary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat</span></a>
                                                        <a data-toggle="modal" href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt1["OVIDBUID"];?>/<?=$gt1["OVDOCNO"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print"></i> &nbsp;Print</span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gt1["OVPOST"] == "3") {?>
                                                    <td><center>
                                                        <a href="#"><span class="badge badge-success"><?=$gt1["verifikasi_pengajuan"];?></span></a>
                                                        </center>
                                                    </td>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt1['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><span class="badge badge-secondary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat</span></a>
                                                        <a data-toggle="modal" href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt1["OVIDBUID"];?>/<?=$gt1["OVDOCNO"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print"></i> &nbsp;Print</span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gt1["OVPOST"] == "11") {?>
                                                    <td><center>
                                                        <a href="#"><span class="badge badge-success"><?=$gt1["finish"];?></span></a>
                                                        </center>
                                                    </td>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt1['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><span class="badge badge-secondary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat</span></a>
                                                        <a data-toggle="modal" href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt1["OVIDBUID"];?>/<?=$gt1["OVDOCNO"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print"></i> &nbsp;Print</span></a>
                                                        </center>
                                                    </td>
                                                <?php }?>
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
<?php } else if($this->session->userdata('SCUSG') == "OPD") {?>
    <div class="content-body btn-page" style="margin-top:-4%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <center><h4 class="card-title">HISTORY PENGAJUAN BERKAS BARU</h4></center>
                        </div>
                        <div class="card-body">

                            <!-- TABEL BERKAS BARU START -->
                            <div class="table-responsive" style="margin-top:20px;">
                                <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                    <thead>
                                        <tr>
                                            <th><center>No</center></th>
                                            <th><center>Nomor Dokumen</center></th>
                                            <th><center>Tanggal Dokumen</center></th>
                                            <th><center>Jumlah Berkas</center></th>
                                            <th><center>Status</center></th>
                                            <th><center>Aksi<center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($history as $gt):?>
                                            <tr>
                                                <td><center><?=$no++;?></center></td>
                                                <td><center><?=$gt["OVDOCNO"];?></center></td>
                                                <td><center><?= date('d-m-Y', strtotime($gt["OVDOCDT"])); ?></center></td>
                                                <td><center><?=$gt["total_berkas"];?></center></td>
                                                
                                                <?php if($gt["OVPOST"] == "0" || $gt["OVPOST"] == NULL) {?>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Approval/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>"><span class="badge badge-warning"><?=$gt["draft"];?></span></a>
                                                        </center>
                                                    </td>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><span class="badge badge-secondary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat</span></a>
                                                        <a href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print"></i> &nbsp;Print</span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gt["OVPOST"] == "1") {?>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Acc/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>"><span class="badge badge-warning"><?=$gt["approval"];?></span></a>
                                                        </center>
                                                    </td>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><span class="badge badge-secondary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat</span></a>
                                                        <a data-toggle="modal" href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print"></i> &nbsp;Print</span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gt["OVPOST"] == "3") {?>
                                                    <td><center>
                                                        <a href="#"><span class="badge badge-success"><?=$gt["verifikasi_pengajuan"];?></span></a>
                                                        </center>
                                                    </td>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><span class="badge badge-secondary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat</span></a>
                                                        <a data-toggle="modal" href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print"></i> &nbsp;Print</span></a>
                                                        </center>
                                                    </td>
                                                <?php } else if($gt["OVPOST"] == "11") {?>
                                                    <td><center>
                                                        <a href="#"><span class="badge badge-success"><?=$gt["finish"];?></span></a>
                                                        </center>
                                                    </td>
                                                    <td><center>
                                                        <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><span class="badge badge-secondary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat</span></a>
                                                        <a data-toggle="modal" href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><span class="badge badge-primary"><i class="fa fa-print"></i> &nbsp;Print</span></a>
                                                        </center>
                                                    </td>
                                                <?php }?>
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
<?php }?>