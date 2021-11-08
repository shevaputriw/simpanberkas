
<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">MASTER LOKASI</h4></center>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Tambah Data</button>
                        <!-- <button type="button" class="btn btn-primary" style="float:right;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Detail Pencarian Data &nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></button>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Status Data</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tanggal Awal</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tanggal Akhir</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input type="text" class="form-control" placeholder="<FIELD TABLE>">
                                                </select>
                                            </div>
                                        </div>
                                        <center><div class="form-row">
                                            <div class="form-group col-md-12">
                                                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                <button type="button" class="btn btn-primary"><i class="fa fa-history"></i></button>
                                                <button type="button" class="btn btn-primary"><i class="fa fa-file-excel"></i></i></button>
                                                <button type="button" class="btn btn-primary"><i class="fa fa-file-pdf"></i></button>
                                                <button type="button" class="btn btn-primary"><i class="fa fa-chart-bar"></i></button>
                                            </div>
                                        </div></center>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width:250px;">OPD</th>
                                        <th>Kode Gudang</th>
                                        <th>No. Rak</th>
                                        <th>Baris</th>
                                        <th>Kolom</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($getAll as $ga):?>
                                    <?php $lmlocid = $ga["LMLOCID"];?>
                                    <?php $locid = preg_replace("/[^0-9]/","",$lmlocid);?>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td style="width:250px;"><?=$ga["BNDESB1"];?></td>
                                        <td><?=$ga["LMWHC"];?></td>
                                        <td><?=$ga["LMAISLE"];?></td>
                                        <td><?=$ga["LMROW"];?></td>
                                        <td><?=$ga["LMCOL"];?></td>
                                        <td>
                                            <a data-toggle="modal" href="#basicModalb<?=$ga["LMIDBUID"];?><?=$locid;?>" title="Lihat Data" class="pd-setting-ed" style="color:#2b2a28;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a data-toggle="modal" href="#basicModal<?=$ga["LMIDBUID"];?><?=$locid;?>" title="Edit Data" style="color:#2b2a28;"><i class="fa fa-edit"></i></a>
                                            <a data-toggle="modal" href="#basicModal2<?=$ga["LMIDBUID"];?><?=$locid;?>" title="Hapus Data" style="color:#2b2a28;"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- MODAL TAMBAH START -->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Lokasi</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="basic-form">
                                            <?php if (validation_errors()): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo validation_errors(); ?>
                                                </div>
                                            <?php endif; ?>
                                            <form action="<?=base_url()?>MasterLokasi/Tambah_Lokasi" method="post">
                                                <input type="hidden" class="form-control" name="LMCOID" value="<?=$kodekab->CNCOID;?>">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label>Unit Kerja/OPD</label>
                                                        <select class="form-control" name="LMIDBUID" id="LMIDBUID" required>
                                                            <option value="" selected="true" disabled="disabled">- Pilih OPD -</option>
                                                            <?php foreach($opd as $opd) : ?>
                                                                <option value="<?=$opd["BNIDBUID"]?>"><?=$opd["BNDESB1"]?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label>Kode Gudang</label>
                                                        <input type="text" class="form-control" name="LMWHC" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>No. Rak</label>
                                                        <input type="text" class="form-control" name="LMAISLE" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>No. Baris</label>
                                                        <input type="text" class="form-control" name="LMROW" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>No. Kolom</label>
                                                        <input type="text" class="form-control" name="LMCOL" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label>Keterangan</label>
                                                        <input type="text" class="form-control" name="LMDESA2" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <center>
                                                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan Data</button>    
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                                            </center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- MODAL TAMBAH END -->

                        <!-- MODAL HAPUS START -->
                        <?php foreach($getAll as $ga):?>
                        <?php $lmlocid = $ga["LMLOCID"];?>
                        <?php $locid = preg_replace("/[^0-9]/","",$lmlocid);?>
                        <div class="modal fade" id="basicModal2<?=$ga["LMIDBUID"];?><?=$locid;?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Lokasi</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="basic-form">
                                            <form method="post" action="<?=base_url('MasterLokasi/Hapus_Lokasi/'.$ga['LMIDBUID'].'/'.$ga["LMLOCID"])?>">
                                                <p style="color:#2b2a28;">Apakah Anda yakin ingin menghapus Lokasi Berkas <b><?=$ga["BNDESB1"];?></b>?</p>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="LMIDBUID" value="<?=$ga["LMIDBUID"];?>">
                                                    <input type="hidden" name="LMLOCID" value="<?=$ga["LMLOCID"];?>">
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
                        <!-- MODAL HAPUS END -->

                        <!-- MODAL DETAIL START -->
                        <?php foreach($getAll as $ga):?>
                        <?php $lmlocid = $ga["LMLOCID"];?>
                        <?php $locid = preg_replace("/[^0-9]/","",$lmlocid);?>
                            <div class="modal fade" id="basicModalb<?=$ga["LMIDBUID"];?><?=$locid;?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Lokasi</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="basic-form">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Unit Kerja/OPD :</b></label>
                                                        <p style="color:#313236"><?=$ga["BNDESB1"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#2b2a28;"><b>Kode Gudang :</b></label>
                                                        <p style="color:#313236"><?=$ga["LMWHC"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>No. Rak :</b></label>
                                                        <p style="color:#313236"><?=$ga["LMAISLE"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>No. Baris :</b></label>
                                                        <p style="color:#313236"><?=$ga["LMROW"];?></p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#2b2a28;"><b>No. Kolom :</b></label>
                                                        <p style="color:#313236"><?=$ga["LMCOL"];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label style="color:#2b2a28;"><b>Keterangan :</b></label>
                                                        <p style="color:#313236"><?=$ga["LMDESA2"];?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"></i> &nbsp;&nbsp;Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <!-- MODAL DETAIL END -->

                        <!-- MODAL EDIT START -->
                        <?php foreach($getAll as $ga):?>
                        <?php $lmlocid = $ga["LMLOCID"];?>
                        <?php $locid = preg_replace("/[^0-9]/","",$lmlocid);?>
                            <div class="modal fade" id="basicModal<?=$ga["LMIDBUID"];?><?=$locid;?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Lokasi</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="basic-form">
                                                <?php if (validation_errors()): ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <?php echo validation_errors(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <form action="<?=base_url('MasterLokasi/Edit_Lokasi/'.$ga['LMIDBUID'].'/'.$ga["LMLOCID"])?>" method="post">
                                                    <input type="hidden" class="form-control" name="LMCOID" value="<?=$ga["LMCOID"];?>">
                                                    <input type="hidden" class="form-control" name="LMIDBUID" value="<?=$ga["LMIDBUID"];?>">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Unit Kerja/OPD</label>
                                                            <input type="text" class="form-control" name="LMBIDBUID" value="<?=$ga["BNDESB1"];?>" readonly style="background-color:#f2f2f2;">
                                                            <!-- <select class="form-control" name="LMIDBUID" id="LMIDBUID">
                                                                <option value="<?=$ga["LMIDBUID"];?>" selected="true"><?=$ga["BNDESB1"];?></option>
                                                                <?php foreach($opd as $opd) : ?>
                                                                    <option value="<?=$opd["BNIDBUID"]?>"><?=$opd["BNDESB1"]?></option>
                                                                <?php endforeach;?>
                                                            </select> -->
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label>Kode Gudang</label>
                                                            <input type="text" class="form-control" name="LMWHC" autocomplete="off" value="<?=$ga["LMWHC"];?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>No. Rak</label>
                                                            <input type="text" class="form-control" name="LMAISLE" autocomplete="off" value="<?=$ga["LMAISLE"];?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>No. Baris</label>
                                                            <input type="text" class="form-control" name="LMROW" autocomplete="off" value="<?=$ga["LMROW"];?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>No. Kolom</label>
                                                            <input type="text" class="form-control" name="LMCOL" autocomplete="off" value="<?=$ga["LMCOL"];?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Keterangan</label>
                                                            <input type="text" class="form-control" name="LMDESA2" autocomplete="off" value="<?=$ga["LMDESA2"];?>">
                                                        </div>
                                                    </div>
                                                    <!-- <br> -->
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <center>
                                                                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan Data</button>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <button type="button" class="btn btn-primary" class="close" data-dismiss="modal"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Batal</button>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <!-- MODAL EDIT END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>