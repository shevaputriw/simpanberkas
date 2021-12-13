<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">PENGAJUAN PINJAM BERKAS</h4></center>
                    </div>
                    <div class="card-body">
                        <!-- TABEL BERKAS BARU START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Dokumen</th>
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
                                            <td><?=$gab["BNDESB1"];?></td>
                                            <td><?= date('d-m-Y', strtotime($gab["ITDOCDT"])); ?></td>
                                            <td><?=$gab["total_berkas"];?></td>
                                            <?php if($gab["ITPOST"] == '0') {?>
                                                <td>
                                                    <span class="badge badge-warning"><?=$gab["draft"];?></span>
                                                </td>
                                                <td>
                                                    <!-- <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" style="color:#000000;"><span class="badge badge-primary">Lihat</span></a> -->
                                                    <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas_bpkad/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed"><span class="badge badge-primary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat Detail</span></a>
                                                    <!-- <a href="<?=base_url()?>PinjamBerkas/tambah_baru/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->
                                                    <!-- <a data-toggle="modal" href="#basicModal2<?=$gab["ITDOCNO"];?>" title="Hapus Data" style="color:#2b2a28;"><i class="fa fa-trash"></i></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/Konfirmasi/<?=$gab["ITDOCNO"];?>/<?=$gab["ITIDBUID"];?>" title="Cetak Berita Acara" style="color:#2b2a28;"><i class="fa fa-print"></i></a> -->
                                                    <!-- <a href="<?=base_url()?>PinjamBerkas/Approval/<?=$gab["ITDOCNO"];?>"><span class="badge badge-primary">Serahkan</span></a> -->
                                                </td>
                                            <?php } else if($gab["ITPOST"] == '2') {?>
                                                <td>
                                                    <span class="badge badge-warning"><?=$gab["pengajuan"];?></span>
                                                </td>
                                                <td>
                                                    <!-- <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed" style="color:#000000;"><span class="badge badge-primary">Lihat</span></a> -->
                                                    <!-- <a data-toggle="modal" href="#basicModal<?=$gab["ITDOCNO"];?><?=$gab["ITICU"];?>" class="pd-setting-ed" style="color:#2b2a28;"><span class="badge badge-primary">Lihat</span></a> -->
                                                    <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas_bpkad/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed"><span class="badge badge-primary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat Detail</span></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/verifikasi_peminjaman/<?=$gab["ITDOCNO"];?>"><span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></span></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/revisi_peminjaman/<?=$gab["ITDOCNO"];?>"><span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span></a>
                                                </td>
                                            <?php } else if($gab["ITPOST"] == '3') {?>
                                                <td>
                                                    <span class="badge badge-warning"><?=$gab["verifikasi"];?></span>
                                                </td>
                                                <td>
                                                    <!-- <a data-toggle="modal" href="#basicModal<?=$gab["ITDOCNO"];?><?=$gab["ITICU"];?>" class="pd-setting-ed" style="color:#2b2a28;"><span class="badge badge-primary">Lihat</span></a> -->
                                                    <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas_bpkad/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed"><span class="badge badge-primary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat Detail</span></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/Acc/<?=$gab["ITDOCNO"];?>"><span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"> Setujui</i></span></a>
                                                </td>
                                            <?php } else if($gab["ITPOST"] == '7') {?>
                                                <td>
                                                    <span class="badge badge-warning"><?=$gab["berkas_keluar"];?></span>
                                                </td>
                                                <td>
                                                    <!-- <a data-toggle="modal" href="#basicModal<?=$gab["ITDOCNO"];?><?=$gab["ITICU"];?>" class="pd-setting-ed" style="color:#2b2a28;"><span class="badge badge-primary">Lihat</span></a> -->
                                                    <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas_bpkad/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed"><span class="badge badge-primary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat Detail</span></a>
                                                </td>
                                            <?php } else if($gab["ITPOST"] == '11') {?>
                                                <td>
                                                    <span class="badge badge-warning"><?=$gab["finish"];?></span>
                                                </td>
                                                <td>
                                                    <!-- <a data-toggle="modal" href="#basicModal<?=$gab["ITDOCNO"];?><?=$gab["ITICU"];?>" class="pd-setting-ed" style="color:#2b2a28;"><span class="badge badge-primary">Lihat</span></a> -->
                                                    <a href="<?=base_url()?>PinjamBerkas/Detail_pinjam_berkas_bpkad/<?=$gab["ITDOCNO"];?>" class="pd-setting-ed"><span class="badge badge-primary"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Lihat Detail</span></a>
                                                </td>
                                            <?php }?>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- TABEL BERKAS BARU END -->

                        <!-- COBA MODAL DETAIL START -->
                        <?php foreach($getAllBerkas as $gab):?>
                        <div class="modal fade" id="basicModal<?=$gab["ITDOCNO"];?><?=$gab["ITICU"];?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail Berkas</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if($gab["ITMSTY"] == 1) {?>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                    <p style="color:#313236"><?=$gab["BNDESB1"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                    <p style="color:#313236"><?=$gab["jenis_berkas"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITINUM"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITDESB1"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                    <p style="color:#313236"><?=$gab["LMDESA2"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["ITDOCDT"])); ?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nomor BPKB :</b></label>
                                                    <p style="color:#313236"><?=$gab["FACOMV"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Merk :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITBRAND"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Warna :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITCOLOR"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Kapasitas Mesin :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITCILCAP"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>No. Rangka :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITMFN"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>No. Mesin :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITMACHNID"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>No. Polisi :</b></label>
                                                    <p style="color:#313236"><?=$gab["FAVHRN"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Akhir Pajak :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["FAVHTAXDT"])); ?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Akhir STNK :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["FAVHRNTAXDT"])); ?></p>
                                                </div>
                                            </div>
                                        <?php } else {?>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                    <p style="color:#313236"><?=$gab["BNDESB1"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                    <p style="color:#313236"><?=$gab["jenis_berkas"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITINUM"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITDESB1"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                    <p style="color:#313236"><?=$gab["LMDESA2"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["ITDOCDT"])); ?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nomor Sertifikat :</b></label>
                                                    <p style="color:#313236"><?=$gab["FACRTFID"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tanggal Sertifikat :</b></label>
                                                    <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["FACRTFDT"])); ?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Status Kepemilikan :</b></label>
                                                    <p style="color:#313236"><?=$gab["FALNDOWNST"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Panjang :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITLENGTH"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Lebar :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITWIDTH"];?></p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Luas :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITWIDE"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Alamat :</b></label>
                                                    <p style="color:#313236"><?=$gab["ITASADDR"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Kabupaten/Kota :</b></label>
                                                    <p style="color:#313236"><?=$gab["kabupaten"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Kecamatan :</b></label>
                                                    <p style="color:#313236"><?=$gab["kecamatan"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Desa :</b></label>
                                                    <p style="color:#313236"><?=$gab["desa1"];?></p>
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"></i> &nbsp;&nbsp;Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <!-- COBA MODAL DETAIL END -->

                        <!-- MODAL DETAIL BERKAS START -->
                        <!-- <?php foreach($getAllBerkas as $gab):?>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="#modal<?=$gab["ITICU"];?>/<?=$gab["ITDOCNO"];?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Berkas</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php if($gab["ITMSTY"] == 1) {?>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                        <p style="color:#313236"><?=$gab["BNDESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                        <p style="color:#313236"><?=$gab["jenis_berkas"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITINUM"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITDESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["LMDESA2"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["ITDOCDT"])); ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Nomor BPKB :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITCOMV"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Merk :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITBRAND"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Warna :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITCOLOR"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Kapasitas Mesin :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITCILCAP"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>No. Rangka :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITMFN"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>No. Mesin :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITMACHNID"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>No. Polisi :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITVHRN"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Akhir Pajak :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["ITVHTAXDT"])); ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Akhir STNK :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["ITVHRNTAXDT"])); ?></p>
                                                    </div>
                                                </div>
                                            <?php } else {?>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                        <p style="color:#313236"><?=$gab["BNDESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                        <p style="color:#313236"><?=$gab["DTDESC1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITINUM"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITDESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["LMDESA2"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["ITDOCDT"])); ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Nomor Sertifikat :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITCRTFID"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Sertifikat :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gab["ITCRTFDT"])); ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Status Kepemilikan :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITLNDOWNST"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Panjang :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITLENGTH"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Lebar :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITWIDTH"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Luas :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITWIDE"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Alamat :</b></label>
                                                        <p style="color:#313236"><?=$gab["ITASADDR"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Kabupaten/Kota :</b></label>
                                                        <p style="color:#313236"><?=$gab["kabupaten"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Kecamatan :</b></label>
                                                        <p style="color:#313236"><?=$gab["kecamatan"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Desa :</b></label>
                                                        <p style="color:#313236"><?=$gab["desa1"];?></p>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"></i> &nbsp;&nbsp;Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?> -->
                        <!-- MODAL DETAIL BERKAS END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>