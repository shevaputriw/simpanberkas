<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">PINJAM BERKAS</h4></center>
                    </div>
                    <div class="card-body">
                        <!-- TABEL BERKAS BARU START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>OPD</th>
                                        <th>Jenis Berkas</th>
                                        <th>Nama Barang</th>
                                        <th>Aksi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($getAllBerkas as $gab):?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$gab["BNDESB1"];?></td>
                                            <td><?=$gab["DTDESC1"];?></td>
                                            <td><?=$gab["ITDESB1"];?></td>
                                            <?php if($gab["ITPOST"] == "0" || $gab["ITPOST"] == NULL) {?>
                                                <td>
                                                    <a data-toggle="modal" href="#basicModal<?=$gab["ITDOCNO"];?><?=$gab["ITDOCSQ"];?><?=$gab["ITIDBUID"];?>" class="pd-setting-ed" style="color:#2b2a28;"><span class="badge badge-success">Lihat</span></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/Ubah_status_pengajuan_pinjam/<?=$gab["ITIDBUID"];?>/<?=$gab["ITDOCNO"];?>/<?=$gab["ITDOCSQ"];?>"><span class="badge badge-warning">Pinjam</span></a>
                                                </td>
                                                <td>
                                                    <a href="#"><span class="badge badge-warning"><?=$gab["a"];?></span></a>
                                                </td>
                                            <?php } else if($gab["ITPOST"] == "A") {?>
                                                <td>
                                                    <a data-toggle="modal" href="#basicModal<?=$gab["ITDOCNO"];?><?=$gab["ITDOCSQ"];?><?=$gab["ITIDBUID"];?>" class="pd-setting-ed" style="color:#2b2a28;"><span class="badge badge-success">Lihat</span></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/Ubah_status_pengajuan_pinjam/<?=$gab["ITIDBUID"];?>/<?=$gab["ITDOCNO"];?>/<?=$gab["ITDOCSQ"];?>"><span class="badge badge-warning">Pinjam</span></a>
                                                </td>
                                                <td>
                                                    <a href="#"><span class="badge badge-warning"><?=$gab["b"];?></span></a>
                                                </td>
                                            <?php } else if($gab["ITPOST"] == "D") {?>
                                                <td>
                                                    <a data-toggle="modal" href="#basicModal<?=$gab["ITDOCNO"];?><?=$gab["ITDOCSQ"];?><?=$gab["ITIDBUID"];?>" class="pd-setting-ed" style="color:#2b2a28;"><span class="badge badge-success">Lihat</span></a>
                                                    <a href="<?=base_url()?>PinjamBerkas/Ubah_status_pengajuan_pinjam/<?=$gab["ITIDBUID"];?>/<?=$gab["ITDOCNO"];?>/<?=$gab["ITDOCSQ"];?>"><span class="badge badge-warning">Pinjam</span></a>
                                                </td>
                                                <td>
                                                    <a href="#"><span class="badge badge-success"><?=$gab["d"];?></span></a>
                                                </td>
                                            <?php } else if($gab["ITPOST"] == "2") {?>
                                                <td>
                                                    <a data-toggle="modal" href="#basicModal<?=$gab["ITDOCNO"];?><?=$gab["ITDOCSQ"];?><?=$gab["ITIDBUID"];?>" class="pd-setting-ed" style="color:#2b2a28;"><span class="badge badge-success">Lihat</span></a>
                                                </td>
                                                <td>
                                                    <a href="#"><span class="badge badge-danger"><?=$gab["c"];?></span></a>
                                                </td>
                                            <?php } else if($gab["ITPOST"] == "3") {?>
                                                <td>
                                                    <a data-toggle="modal" href="#basicModal<?=$gab["ITDOCNO"];?><?=$gab["ITDOCSQ"];?><?=$gab["ITIDBUID"];?>" class="pd-setting-ed" style="color:#2b2a28;"><span class="badge badge-success">Lihat</span></a>
                                                </td>
                                                <td>
                                                    <a href="#"><span class="badge badge-danger"><?=$gab["e"];?></span></a>
                                                </td>
                                            <?php }?>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- TABEL BERKAS BARU END -->

                        <!-- MODAL DETAIL BERKAS START -->
                        <?php foreach($getAllBerkas as $gab):?>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="basicModal<?=$gab["ITDOCNO"];?><?=$gab["ITDOCSQ"];?><?=$gab["ITIDBUID"];?>">
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
                                                        <p style="color:#313236"><?=$gab["DTDESC1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                        <p style="color:#313236"><?=$gab["AMOBJ"];?></p>
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
                                                        <p style="color:#313236"><?=$gab["AMOBJ"];?></p>
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
                                                        <p style="color:#313236"><?=$gab["kabkota"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Kecamatan :</b></label>
                                                        <p style="color:#313236"><?=$gab["kecamatan"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Desa :</b></label>
                                                        <p style="color:#313236"><?=$gab["desa"];?></p>
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
                        <!-- MODAL DETAIL BERKAS END -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>