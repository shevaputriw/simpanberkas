<div class="content-body" style="margin-bottom:-9.6%;">
    <div class="container-fluid" style="margin-top:-4%;">
        <div class="row">
            <div class="col-md-12">
                <!-- CARD FORM START -->
                <div class="card">
                    <div class="card-header d-block">
                        <center>
                            <div class="stepwizard col-md-offset-3" style="margin-top:-10px;">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a>
                                        <p>Step 1</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-file"></i></a>
                                        <p>Step 2</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-upload"></i></a>
                                        <p>Step 3</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-chevron-circle-right"></i></a>
                                        <p>Step 4</p>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                    <br>
                    <div class="basic-form">
                        <form action="<?=base_url()?>BerkasBaru/Tambah_Baru/<?=$opd["OVDOCNO"]?>/<?=$opd["OVIDBUID"]?>" method="post">
                            <div class="card-body">
                                <!-- NAV TABS START-->
                                <ul class="nav nav-tabs" role="tablist" style="margin-top:-40px;">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#umum" id="tab_umum">Umum
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" data-toggle="tab" href="#kendaraan" id="tab_kendaraan">Kendaraan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" data-toggle="tab" href="#tanah" id="tab_tanah">Tanah
                                        </a>
                                    </li>
                                </ul>
                                <!-- NAV TABS END -->
                                <div class="tab-content tabcontent-border">
                                    <!-- TAB UMUM START -->
                                    <div class="tab-pane fade show active" id="umum" role="tabpanel">
                                        <div class="pt-4">
                                            <center><h4 class="card-title" style="margin-top:-10px;">TAMBAH BERKAS</h4></center><br>
                                            <input type="hidden" class="form-control" name="OVCOID" value="<?=$kodekab->CNCOID;?>">
                                            <input type="hidden" class="form-control" name="OVDOCDT" value="<?=$opd["OVDOCDT"];?>" 
                                            style="background-color:#f2f2f2;">
                                            <input type="hidden" class="form-control" name="OVLST" value="400">
                                            <input type="hidden" class="form-control" name="OVNST" value="440">
                                            <input type="hidden" class="form-control" name="OVIDBUID" id="OVIDBUID" value="<?=$opd["OVIDBUID"];?>">
                                            <!-- <p id="result2"></p> -->
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">OPD</label>
                                                    <input type="text" class="form-control" name="OVIDBUID" disabled value="<?=$opd["BNDESB1"];?>" style="background-color:#f2f2f2;">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Nomor Dokumen</label>
                                                    <input type="text" class="form-control" name="OVDOCNO" value="<?=$opd["OVDOCNO"];?>" style="background-color:#f2f2f2;" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Tanggal</label>
                                                    <input type="text" class="form-control" name="OVDOCDT" value="<?= date('d-m-Y', strtotime($opd["OVDOCDT"])); ?>" style="background-color:#f2f2f2;" disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Jenis Berkas</label>
                                                    <select class="form-control" name="OVMSTY" id="OVMSTY">
                                                        <option value="" selected="true" disabled="disabled">- Pilih Jenis Berkas -</option>
                                                        <?php foreach($jenis_berkas as $jb) : ?>
                                                            <option value="<?=$jb["DTDC"]?>"><?=$jb["DTDESC1"]?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Kode Barang</label>
                                                    <select class="form-control" name="OVINUM" id="OVINUM" required>
                                                        <option value="" selected="true" disabled="disabled">- Pilih Kode Barang -</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Lokasi Barang</label>
                                                    <select class="form-control" name="OVLOCID" id="OVLOCID" required>
                                                        <!-- <option value="" selected="true" disabled="disabled">- Pilih Lokasi Barang -</option> -->
                                                        <!-- <option value="<?=$opd["OVLOCID"];?>" selected><?=$opd["OVLOCID"];?></option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label style="color:#313236">Nama Barang</label>
                                                    <input type="text" class="form-control" name="OVDESB1" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <!-- TAB UMUM END -->
                                    
                                    <!-- TAB TANAH START -->
                                    <div class="tab-pane fade" id="kendaraan" role="tabpanel">
                                        <div class="pt-4">
                                            <center><h4 class="card-title" style="margin-top:-10px;">TAMBAH BERKAS BARU</h4></center><br>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label style="color:#313236">No. BPKB</label>
                                                    <input type="text" class="form-control" name="OVCOMV" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Merk</label>
                                                    <input type="text" class="form-control" name="OVBRAND" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Warna</label>
                                                    <input type="text" class="form-control" name="OVCOLOR" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Kapasitas Mesin</label>
                                                    <input type="text" class="form-control" name="OVCILCAP" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">No. Rangka</label>
                                                    <input type="text" class="form-control" name="OVMFN" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">No. Mesin</label>
                                                    <input type="text" class="form-control" name="OVMACHNID" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">No. Polisi</label>
                                                    <input type="text" class="form-control" name="OVVHRN" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#313236">Tanggal Akhir Pajak</label>
                                                    <input type="date" class="form-control" name="OVVHTAXDT" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#313236">Tanggal Akhir STNK</label>
                                                    <input type="date" class="form-control" name="OVVHRNTAXDT" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TAB TANAH END -->

                                    <!-- TAB SERTIFIKAT START -->
                                    <div class="tab-pane fade" id="tanah" role="tabpanel">
                                        <div class="pt-4">
                                            <center><h4 class="card-title" style="margin-top:-10px;">TAMBAH BERKAS BARU</h4></center><br>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">No. Serifikat</label>
                                                    <input type="text" class="form-control" name="OVCRTFID" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Tanggal Serifikat</label>
                                                    <input type="date" class="form-control" name="OVCRTFDT" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Status Kepemilikan</label>
                                                    <input type="text" class="form-control" name="OVLNDOWNST" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Panjang</label>
                                                    <input type="text" class="form-control" name="OVLENGTH" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Lebar</label>
                                                    <input type="text" class="form-control" name="OVWIDTH" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Luas</label>
                                                    <input type="text" class="form-control" name="OVWIDE" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label style="color:#313236">Alamat</label>
                                                    <input type="text" class="form-control" name="OVASADDR" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Kabupaten/Kota</label>
                                                    <select class="form-control" name="OVCITY" id="OVCITY">
                                                        <option value="" selected="true" disabled="disabled">- Pilih Kabupaten/Kota -</option>
                                                        <?php foreach($getKabKota as $gkk) : ?>
                                                            <option value="<?=$gkk["DTDC"]?>"><?=$gkk["DTDESC1"]?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Kecamatan</label>
                                                    <select class="form-control" name="OVDIST" id="OVDIST">
                                                    <option value="" selected="true" disabled="disabled">- Pilih Kecamatan -</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#313236">Desa</label>
                                                    <select class="form-control" name="OVSUBDIST" id="OVSUBDIST">
                                                    <option value="" selected="true" disabled="disabled">- Pilih Desa -</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TAB SERTIFIKAT END -->     
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                        &nbsp;&nbsp;
                                        <a href="<?=base_url()?>BerkasBaru/index"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Batal</button></a>
                                    </center>
                                </div>
                            </div>
                            <div id=""></div>
                        </form>
                    </div>
                </div>
                <!-- CARD FORM END -->

                <!-- CARD TABEL DATA -->
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">DETAIL BERKAS</h4></center><br>
                    </div>
                    <div class="card-body">
                        <?php foreach($get_data as $gt):?>
                            <a href="<?=base_url()?>BerkasBaru/Konfirmasi/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCNO"];?>">
                        <?php endforeach;?>
                                <button type="button" class="btn btn-primary" style="float:right;"><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Berita Acara</button>
                            </a>
                        <br><br>
                        <!-- TABLE START -->
                        <div class="table-responsive">         
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Jenis Berkas</th>
                                        <th>Nama Barang</th>
                                        <th>Lokasi Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($get_data as $gt):?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$gt["OVINUM"];?></td>
                                            <td><?=$gt["DTDESC1"];?></td>
                                            <td><?=$gt["OVDESB1"];?></td>
                                            <td><?=$gt["LMDESA2"];?></td>
                                            <td>
                                                <a data-toggle="modal" href="#basicModal<?=$gt["OVDOCNO"];?><?=$gt["OVDOCSQ"];?><?=$gt["OVIDBUID"];?>" class="pd-setting-ed" style="color:#2b2a28;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="<?=base_url()?>BerkasBaru/Edit_Berkas/<?=$gt["OVDOCNO"];?>/<?=$gt["OVDOCSQ"];?>/<?=$gt["OVIDBUID"];?>/<?=$gt["OVDOCTY"];?>" class="pd-setting-ed" style="color:#000000;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a data-toggle="modal" href="#basicModal2<?=$gt["OVDOCNO"];?><?=$gt["OVDOCSQ"];?><?=$gt["OVIDBUID"];?>" title="Hapus Data" style="color:#2b2a28;"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- TABLE END -->

                        <!-- MODAL HAPUS BERKAS START -->
                        <?php foreach($get_data as $gt):?>
                            <div class="modal fade" id="basicModal2<?=$gt["OVDOCNO"];?><?=$gt["OVDOCSQ"];?><?=$gt["OVIDBUID"];?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Berkas</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="basic-form">
                                                <form method="post" action="<?=base_url('BerkasBaru/Hapus_berkas/'.$gt['OVDOCNO'].'/'.$gt["OVDOCSQ"].'/'.$gt['OVIDBUID'])?>">
                                                    <p style="color:#2b2a28;">Apakah Anda yakin ingin menghapus berkas <b><?=$gt["OVDESB1"];?></b>?</p>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="OVIDBUID" value="<?=$gt["OVIDBUID"];?>">
                                                        <input type="hidden" name="OVDOCNO" value="<?=$gt["OVDOCNO"];?>">
                                                        <input type="hidden" name="OVDOCSQ" value="<?=$gt["OVDOCSQ"];?>">
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
                        <!-- MODAL HAPUS BERKAS END -->

                        <!-- MODAL DETAIL BERKAS START -->
                        <?php foreach($get_data as $gt):?>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="basicModal<?=$gt["OVDOCNO"];?><?=$gt["OVDOCSQ"];?><?=$gt["OVIDBUID"];?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Berkas</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php if($gt["OVMSTY"] == 1) {?>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                        <p style="color:#313236"><?=$gt["BNDESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                        <p style="color:#313236"><?=$gt["DTDESC1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                        <p style="color:#313236"><?=$gt["AMOBJ"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVDESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                        <p style="color:#313236"><?=$gt["LMDESA2"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gt["OVDOCDT"])); ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Nomor BPKB :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVCOMV"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Merk :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVBRAND"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Warna :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVCOLOR"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Kapasitas Mesin :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVCILCAP"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>No. Rangka :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVMFN"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>No. Mesin :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVMACHNID"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>No. Polisi :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVVHRN"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Akhir Pajak :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gt["OVVHTAXDT"])); ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Akhir STNK :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gt["OVVHRNTAXDT"])); ?></p>
                                                    </div>
                                                </div>
                                            <?php } else {?>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>OPD :</b></label>
                                                        <p style="color:#313236"><?=$gt["BNDESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Jenis Berkas :</b></label>
                                                        <p style="color:#313236"><?=$gt["DTDESC1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Kode Barang :</b></label>
                                                        <p style="color:#313236"><?=$gt["AMOBJ"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Nama Barang :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVDESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Lokasi Barang :</b></label>
                                                        <p style="color:#313236"><?=$gt["LMDESA2"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Dokumen :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gt["OVDOCDT"])); ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Nomor Sertifikat :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVCRTFID"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Tanggal Sertifikat :</b></label>
                                                        <p style="color:#313236"><?= date('d-m-Y', strtotime($gt["OVCRTFDT"])); ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Status Kepemilikan :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVLNDOWNST"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Panjang :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVLENGTH"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Lebar :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVWIDTH"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>Luas :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVWIDE"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Alamat :</b></label>
                                                        <p style="color:#313236"><?=$gt["OVASADDR"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Kabupaten/Kota :</b></label>
                                                        <p style="color:#313236"><?=$gt["kabkota"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Kecamatan :</b></label>
                                                        <p style="color:#313236"><?=$gt["kecamatan"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Desa :</b></label>
                                                        <p style="color:#313236"><?=$gt["desa"];?></p>
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
                <!-- CARD TABEL DATA END -->
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    $("#OVIDBUID").select2();
</script>-->

<script type="text/javascript">
    $("#OVINUM").select2();
</script>

<script type="text/javascript">
    $("#OVLOCID").select2();
</script> 

<script>
    $('#OVMSTY').change(function(){
        var responseID = $("#OVMSTY").val();

        if(responseID == "1") {
            $('#tab_kendaraan').removeClass('disabled');
            $('#tab_tanah').addClass('disabled');
        }
        else {
            $('#tab_tanah').removeClass('disabled');
            $('#tab_kendaraan').addClass('disabled');
        }
    });
</script>

<script>
    $("#OVCITY").change(function(){

        // variabel dari nilai combo box kabupaten/kota
        var dtdc = $("#OVCITY").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>BerkasBaru/get_Kecamatan/' + dtdc,
            method : "POST",
            data : {dtdc:dtdc},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].DTDC+'>'+data[i].DTDESC1+'</option>';
                }
                $('#OVDIST').html(html);

            }
        });
    });

    $("#OVDIST").change(function(){

        // variabel dari nilai combo box kecamatan
        var dtdc1 = $("#OVDIST").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>BerkasBaru/get_Desa/' + dtdc1,
            method : "POST",
            data : {dtdc1:dtdc1},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].DTDC+'>'+data[i].DTDESC1+'</option>';
                }
                $('#OVSUBDIST').html(html);

            }
        });
    });
</script>

<!-- GET LOKASI BARANG -->
<script>
    $(document).ready(function(){

        var x = $("#OVIDBUID").val();
        // var x2 = x.options[x.selectedIndex].value;
        // document.getElementById("result2").innerHTML = x;

        // var y = document.getElementById("OVLOCID");
        // var y2 = y.options[y.selectedIndex].value;

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url() ?>BerkasBaru/get_Lokasi/' + x,
            method : "POST",
            data : {x:x},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;

                for(i=0; i<data.length; i++){
                    // if(y2 == data[i].LMLOCID) {
                    //     html += '<option value='+data[i].LMLOCID+' selected>'+data[i].LMLOCID+'</option>';
                    // }
                    // else {
                        html += '<option value='+data[i].LMLOCID+'>'+data[i].LMDESA2+'</option>';
                    // }
                }
                $('#OVLOCID').html(html);

            }
        });
    });
</script>

<!-- GET KODE BARANG -->
<script>
    $("#OVMSTY").change(function(){

        // variabel dari nilai combo box kabupaten/kota
        var msty = $("#OVMSTY").val();
        // document.getElementById("result2").innerHTML = msty;
        if (msty == 1) {
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url: '<?= base_url() ?>BerkasBaru/get_Kendaraan/',
                method : "POST",
                // data : ,
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].AMOBJ+'>'+data[i].AMDESB1+'</option>';
                    }
                    $('#OVINUM').html(html);
                }
            });
        }
        else {
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url: '<?= base_url() ?>BerkasBaru/get_Sertifikat/',
                method : "POST",
                // data : ,
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].AMOBJ+'>'+data[i].AMDESB1+'</option>';
                    }
                    $('#OVINUM').html(html);
                }
            });
        }
    });
</script>