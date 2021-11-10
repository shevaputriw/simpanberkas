
<div class="content-body btn-page" style="margin-bottom:-9.6%;margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">MASTER UNIT KERJA</h4></center>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Tambah Unit</button>
                        <a href="<?=base_url()?>MasterUnitKerja/OPD">
                            <button type="button" class="btn btn-primary" style="float:right;" role="button">Data OPD &nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
                        </a>
                        <!-- <button type="button" class="btn btn-primary" style="float:right;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Detail Pencarian Data &nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></button> -->
                        <!-- <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Status Data</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Tanggal Awal</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Tanggal Akhir</label>
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

                        <!-- TABEL DATA UNIT START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Kabupaten/Kota</th>
                                        <th>Tahun Fiksal</th>
                                        <th>Bulan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($unitkerja as $uk):?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$uk["CNCOID"];?></td>
                                            <td><?=$uk["CNDESB1"];?></td>
                                            <td><?=$uk["CNCFY"];?></td>
                                            <td><?=$uk["CNCAP"];?></td>
                                            <td>
                                                <a data-toggle="modal" href="#basicModal<?=$uk["CNCOID"];?>" title="Edit Data" style="color:#2b2a28;"><i class="fa fa-edit"></i></a>
                                                <a data-toggle="modal" href="#basicModal2<?=$uk["CNCOID"];?>" title="Hapus Data" style="color:#2b2a28;"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- TABEL DATA UNIT END -->

                        <!-- MODAL TAMBAH UNIT -->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Unit</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="basic-form">
                                            <?php if (validation_errors()): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo validation_errors(); ?>
                                                </div>
                                            <?php endif; ?>
                                            <form action="<?=base_url()?>MasterUnitKerja/Tambah_unit" method="post">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Kode</label>
                                                        <input type="text" class="form-control" name="CNCOID" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Tahun Fiksal</label>
                                                        <input type="text" class="form-control" name="CNCFY" autocomplete="off" placeholder="yyyy">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Kabupaten/Kota</label>
                                                        <input type="text" class="form-control" name="CNDESB1" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Bulan</label>
                                                        <input type="text" class="form-control" name="CNCAP" autocomplete="off" placeholder="dd">
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
                        <!-- MODAL TAMBAH UNIT END -->

                        <!-- MODAL EDIT UNIT -->
                        <?php foreach($unitkerja as $uk):?>
                            <div class="modal fade" id="basicModal<?=$uk["CNCOID"];?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Unit</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="basic-form">
                                                <?php if (validation_errors()): ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <?php echo validation_errors(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <form action="<?=base_url('MasterUnitKerja/Edit_unit/'.$uk['CNCOID'])?>" method="post">
                                                    <input type="hidden" name="CNCOID" value="<?=$uk["CNCOID"];?>">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label style="color:#313236">Kode</label>
                                                            <input type="text" class="form-control" name="CNCOID" autocomplete="off" value="<?=$uk["CNCOID"];?>" disabled style="background-color:#f2f2f2;">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label style="color:#313236">Tahun Fiksal</label>
                                                            <input type="text" class="form-control" name="CNCFY" autocomplete="off" value="<?=$uk["CNCFY"];?>" placeholder="yyyy">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label style="color:#313236">Kabupaten/Kota</label>
                                                            <input type="text" class="form-control" name="CNDESB1" autocomplete="off" value="<?=$uk["CNDESB1"];?>" disabled style="background-color:#f2f2f2;">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label style="color:#313236">Bulan</label>
                                                            <input type="text" class="form-control" name="CNCAP" autocomplete="off" value="<?=$uk["CNCAP"];?>" placeholder="dd">
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
                        <!-- MODAL EDIT UNIT END -->

                        <!-- MODAL HAPUS UNIT START-->
                        <?php foreach($unitkerja as $uk):?>
                            <div class="modal fade" id="basicModal2<?=$uk["CNCOID"];?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Unit</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="basic-form">
                                                <form method="post" action="<?=base_url('MasterUnitKerja/Hapus_unit/'.$uk['CNCOID'])?>">
                                                    <p style="color:#2b2a28;">Apakah Anda yakin ingin menghapus data <b><?=$uk["CNDESB1"];?></b>?</p>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="CNCOID" value="<?=$uk["CNCOID"];?>">
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
                        <!-- MODAL HAPUS UNIT END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>