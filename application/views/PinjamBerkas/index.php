<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">PINJAM BERKAS</h4></center>
                    </div>
                    <div class="card-body">
                        <a href="<?=base_url()?>PinjamBerkas/pengajuan_pinjam_berkas"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Pinjam Berkas</button></a>
                        <!-- TABEL BERKAS BARU START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Dokumen</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah Berkas</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($getAllBerkas as $gab):?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$gab["ITDOCNO"];?></td>
                                            <!-- <td><?=$gab["ITIDBUID"];?></td> -->
                                            <td><?= date('d-m-Y', strtotime($gab["ITDOCDT"])); ?></td>
                                            <td><?=$gab["total_berkas"];?></td>
                                            <?php if($gab["ITPOST"] == '0') {?>
                                                <td>
                                                    <a href="#"><span class="badge badge-warning"><?=$gab["draft"];?></span></a>
                                                </td>
                                                <td>
                                                    <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/tambah_baru/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <a data-toggle="modal" href="#basicModal2<?=$gab["ITDOCNO"];?>" title="Hapus Data" style="color:#2b2a28;"><i class="fa fa-trash"></i></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/Konfirmasi/<?=$gab["ITDOCNO"];?>/<?=$gab["ITIDBUID"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><i class="fa fa-print"></i></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/Approval/<?=$gab["ITDOCNO"];?>"><span class="badge badge-primary">Serahkan</span></a>
                                                </td>
                                            <?php } else if($gab["ITPOST"] == '2') {?>
                                                <td>
                                                    <a href="#"><span class="badge badge-warning"><?=$gab["pengajuan"];?></span></a>
                                                </td>
                                                <td>
                                                    <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/tambah_baru/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <a data-toggle="modal" href="#basicModal2<?=$gab["ITDOCNO"];?>" title="Hapus Data" style="color:#2b2a28;"><i class="fa fa-trash"></i></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/Konfirmasi/<?=$gab["ITDOCNO"];?>/<?=$gab["ITIDBUID"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><i class="fa fa-print"></i></a>
                                                </td>
                                            <?php } else if($gab["ITPOST"] == '3') {?>
                                                <td>
                                                    <a href="#"><span class="badge badge-warning"><?=$gab["verifikasi"];?></span></a>
                                                </td>
                                                <td>
                                                    <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/Konfirmasi/<?=$gab["ITDOCNO"];?>/<?=$gab["ITIDBUID"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><i class="fa fa-print"></i></a>
                                                </td>
                                            <?php } else if($gab["ITPOST"] == '7') {?>
                                                <td>
                                                    <a href="#"><span class="badge badge-warning"><?=$gab["berkas_keluar"];?></span></a>
                                                </td>
                                                <td>
                                                    <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                </td>
                                            <?php }?>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- TABEL BERKAS BARU END -->

                        <!-- MODAL HAPUS BERKAS BARU START -->
                        <?php foreach($getAllBerkas as $gab):?>
                            <div class="modal fade" id="basicModal2<?=$gab["ITDOCNO"];?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Berkas</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="basic-form">
                                                <form method="post" action="<?=base_url('PinjamBerkas/hapus_pengajuan_pinjam/'.$gab['ITDOCNO'])?>">
                                                    <p style="color:#2b2a28;">Apakah Anda yakin ingin menghapus semua berkas pada dokumen ini?</p>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="ITDOCNO" value="<?=$gab["ITDOCNO"];?>">
                                                        <button type="submit" name="submit" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp;&nbsp;Hapus</button>
                                                        <button type="button" class="btn btn-primary" class="close" data-dismiss="modal"><i class="fa fa-times-circle"></i> &nbsp;&nbsp;Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <!-- MODAL HAPUS BERKAS BARU END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>