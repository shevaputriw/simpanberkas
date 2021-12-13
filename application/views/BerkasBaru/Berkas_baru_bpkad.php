<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">BERKAS BARU</h4></center>
                    </div>
                    <div class="card-body">
                        TABEL BERKAS BARU START
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Dokumen</th>
                                        <th>OPD</th>
                                        <th>Tanggal Dokumen</th>
                                        <th>Jumlah Berkas</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($getAll as $gt):?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$gt["OVDOCNO"];?></td>
                                            <td><?=$gt["BNDESB1"];?></td>
                                            <td><?= date('d-m-Y', strtotime($gt["OVDOCDT"])); ?></td>
                                            <td><?=$gt["total_berkas"];?></td>
                                            
                                            <?php if($gt["OVPOST"] == "0" || $gt["OVPOST"] == NULL) {?>
                                                <td>
                                                    <a href="<?=base_url()?>BerkasBaru/Approval/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>"><span class="badge badge-warning"><?=$gt["draft"];?></span></a>
                                                </td>
                                                <td>
                                                    <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="<?=base_url()?>BerkasBaru/Tambah_Baru/<?=$gt['OVDOCNO'];?>/<?=$gt['OVIDBUID'];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <a data-toggle="modal" href="#basicModal2<?=$gt["OVIDBUID"];?><?=$gt["OVDOCNO"];?>" title="Hapus Data" style="color:#2b2a28;"><i class="fa fa-trash"></i></a>
                                                </td>
                                                <td>
                                                    
                                                </td>
                                            <?php } else if($gt["OVPOST"] == "1") {?>
                                                <td>
                                                    <a href="<?=base_url()?>BerkasBaru/Acc/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>"><span class="badge badge-warning"><?=$gt["approval"];?></span></a>
                                                    <a href="#"><span class="badge badge-primary">Lihat Dokumen</span></a>
                                                </td>
                                                <td>
                                                    <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a data-toggle="modal" href="#basicModal<?=$gt["OVIDBUID"];?><?=$gt["OVDOCNO"];?>" title="Edit Data" style="color:#2b2a28;"><i class="fa fa-edit"></i></a>
                                                </td>
                                                <td>
                                                    <a href="<?=base_url()?>BerkasBaru/Verifikasi_pengajuan/<?=$gt["OVDOCNO"];?>" style="color:#000000;"><span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></span></a>
                                                    <a href="<?=base_url()?>BerkasBaru/revisi_pengajuan/<?=$gt["OVDOCNO"];?>" style="color:#000000;"><span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span></a>
                                                </td>
                                            <?php } else if($gt["OVPOST"] == "3") {?>
                                                <td>
                                                    <a href="#"><span class="badge badge-warning"><?=$gt["verifikasi_pengajuan"];?></span></a>
                                                    <a href="#"><span class="badge badge-primary">Lihat Dokumen</span></a>
                                                </td>
                                                <td>
                                                    <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a data-toggle="modal" href="#basicModal<?=$gt["OVIDBUID"];?><?=$gt["OVDOCNO"];?>" title="Edit Data" style="color:#2b2a28;"><i class="fa fa-edit"></i></a>
                                                    <a data-toggle="modal" href="#" title="Cetak Tanda Terima Berkas Baru" style="color:#2b2a28;"><i class="fa fa-print"></i></a>
                                                </td>
                                                <td>
                                                    <a  href="<?=base_url()?>BerkasBaru/Acc/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCTY"];?>" style="color:#000000;"><span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></span></a>
                                                </td>
                                            <?php } else if($gt["OVPOST"] == "11") {?>
                                                <td>
                                                    <a href="#"><span class="badge badge-success"><?=$gt["finish"];?></span></a>
                                                </td>
                                                <td>
                                                    <a href="<?=base_url()?>BerkasBaru/Detail/<?=$gt['OVDOCNO'];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                </td>
                                                <td>
                                                    <a href="<?=base_url()?>BerkasBaru/Mutasi/<?=$gt["OVIDBUID"];?>/<?=$gt["OVIDINUM"];?>/<?=$gt["OVINUM"];?>/<?=$gt["OVLOCID"];?>"><span class="badge badge-danger">Mutasi</span></a>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        TABEL BERKAS BARU END
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

