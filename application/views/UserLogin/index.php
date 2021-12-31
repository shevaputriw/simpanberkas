
<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">USER LOGIN</h4></center>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;&nbsp;Tambah User</button>
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
                                        <th><center>No</center></th>
                                        <th><center>Nama User</center></th>
                                        <th><center>Username</center></th>
                                        <th><center>Password</center></th>
                                        <th><center>Hak Akses</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($getAll as $gt):?>
                                        <tr>
                                        <td><center><?=$no++;?></center></td>
                                        <td><?=$gt["BNDESB1"];?></td>
                                        <td><center><?=$gt["SCUSI"];?></center></td>
                                        <td><center><?=$gt["SCUSC"];?></center></td>
                                        <td><center><?=$gt["SCUSG"];?></center></td>
                                        <td><center>
                                            <!-- EDIT -->
                                            <a data-toggle="modal" href="#basicModal<?=$gt["SCIDBUID"];?><?=$gt["SCSEQ"];?>" title="Edit" style="color:#2b2a28;"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>

                                            <!-- HAPUS -->
                                            <a data-toggle="modal" href="#basicModal2<?=$gt["SCIDBUID"];?><?=$gt["SCSEQ"];?>" title="Hapus" style="color:#2b2a28;"><span class="badge badge-danger"><i class="fa fa-trash"></i></span></a>
                                            </center>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- MODAL TAMBAH USER START -->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah User</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="basic-form">
                                            <?php if (validation_errors()): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo validation_errors(); ?>
                                                </div>
                                            <?php endif; ?>
                                            <form action="<?=base_url()?>UserLogin/Tambah_user" method="post">
                                                <input type="hidden" class="form-control" name="SCCOID" value="<?=$kode_kab->CNCOID;?>">
                                                <div class="form-group col-md-12">
                                                    <label style="color:#313236"><b>Unit Kerja/OPD</b></label>
                                                    <select class="form-control" name="SCIDBUID" required>
                                                        <option value="" selected="true" disabled="disabled">- Pilih OPD -</option>
                                                        <?php foreach($opd as $opd) : ?>
                                                            <option value="<?=$opd["BNIDBUID"]?>"><?=$opd["BNDESB1"]?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label style="color:#313236"><b>Username</b></label>
                                                    <input type="text" class="form-control" name="SCUSI" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label style="color:#313236"><b>Password</b></label>
                                                    <input type="text" class="form-control" name="SCUSC" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label style="color:#313236"><b>Hak Akses</b></label>
                                                    <select class="form-control" name="SCUSG" required>
                                                        <option value="" selected="true" disabled="disabled">- Pilih Jenis User -</option>
                                                        <?php foreach($hak_akses as $ha) : ?>
                                                            <option value="<?=$ha["DTDESC1"]?>"><?=$ha["DTDESC1"]?></option>
                                                        <?php endforeach;?>
                                                    </select>
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
                        <!-- MODAL TAMBAH USER END -->

                        <!-- MODAL EDIT USER START -->
                        <?php foreach($getAll as $gt):?>
                            <div class="modal fade" id="basicModal<?=$gt["SCIDBUID"];?><?=$gt["SCSEQ"];?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit User</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="basic-form">
                                                <?php if (validation_errors()): ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <?php echo validation_errors(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <form action="<?=base_url('UserLogin/Edit_user/'.$gt['SCIDBUID'].'/'.$gt["SCSEQ"])?>" method="post">
                                                    <input type="hidden" class="form-control" name="SCCOID" value="<?=$gt["SCCOID"];?>">
                                                    <input type="hidden" class="form-control" name="SCIDBUID" value="<?=$gt["SCIDBUID"];?>">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color:#313236"><b>Unit Kerja/OPD</b></label>
                                                            <input type="text" class="form-control" name="SCBUID" autocomplete="off" value="<?=$gt["BNDESB1"];?>" readonly>
                                                            <!-- <select class="form-control" name="SCIDBUID">
                                                                <?php foreach($unit_kerja as $o) :?>
                                                                    <?php if($o["BNIDBUID"] == $gt["SCIDBUID"]) {?>
                                                                        <option value="<?=$gt["SCIDBUID"]?>" selected><?=$gt["BNDESB1"];?></option>
                                                                    <?php }
                                                                    else {?>
                                                                        <option value="<?=$o["BNIDBUID"]?>"><?=$o["BNDESB1"]?></option>
                                                                    <?php }?>
                                                                <?php endforeach;?>
                                                            </select> -->
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color:#313236"><b>Username</b></label>
                                                            <input type="text" class="form-control" name="SCUSI" autocomplete="off" value="<?=$gt["SCUSI"];?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color:#313236"><b>Password</b></label>
                                                            <input type="text" class="form-control" name="SCUSC" autocomplete="off" value="<?=$gt["SCUSC"];?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color:#313236"><b>Hak Milik</b></label>
                                                            <select class="form-control" name="SCUSG">
                                                                <?php foreach($akses as $a) :?>
                                                                    <?php if($a["DTDESC1"] == $gt["SCUSG"]) {?>
                                                                        <option value="<?=$gt["SCUSG"]?>" selected><?=$gt["SCUSG"];?></option>
                                                                    <?php }
                                                                    else {?>
                                                                        <option value="<?=$a["DTDESC1"]?>"><?=$a["DTDESC1"]?></option>
                                                                    <?php }?>
                                                                <?php endforeach;?>
                                                            </select>
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

                        <!-- MODAL HAPUS USER START -->
                        <?php foreach($getAll as $gt):?>
                            <div class="modal fade" id="basicModal2<?=$gt["SCIDBUID"];?><?=$gt["SCSEQ"];?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus User</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="basic-form">
                                                <form method="post" action="<?=base_url('UserLogin/Hapus_user/'.$gt['SCIDBUID'].'/'.$gt["SCSEQ"])?>">
                                                    <p style="color:#2b2a28;">Apakah Anda yakin ingin menghapus User dari <b><?=$gt["BNDESB1"];?></b>?</p>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="SCIDBUID" value="<?=$gt["SCIDBUID"];?>">
                                                        <input type="hidden" name="SCSEQ" value="<?=$gt["SCSEQ"];?>">
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
                        <!-- MODAL HAPUS USER END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>