<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">DATA OPD</h4></center>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Tambah Data</button>

                        <!-- TABEL DATA OPD START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th><center>No</center></th>
                                        <th><center>No</center></th>
                                        <th><center>Kode OPD</center></th>
                                        <th><center>Nama Unit Kerja/OPD</center></th>
                                        <th><center>Tipe</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($unitkerja as $opd):?>
                                        <tr>
                                            <td><center><?=$no++;?></center></td>
                                            <td><center><?=$opd["BNDVS"];?></center></td>
                                            <td><center><?=$opd["BNBUID"];?></center></td>
                                            <td style="width:230px;"><?=$opd["BNDESB1"];?></td>
                                            <td><center><?=$opd["DTDESC1"];?></center></td>
                                            <td><center>
                                                <!-- DETAIL -->
                                                <a data-toggle="modal" href="#basicModalb<?=$opd["BNIDBUID"];?><?=$opd["BNBUID1"]?>" class="pd-setting-ed" style="color:#2b2a28;" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></span></i></a>

                                                <!-- EDIT -->
                                                <a data-toggle="modal" href="#basicModal<?=$opd["BNIDBUID"];?>" title="Edit" style="color:#2b2a28;"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>

                                                <!-- HAPUS -->
                                                <a data-toggle="modal" href="#basicModal2<?=$opd["BNIDBUID"];?>" title="Hapus" style="color:#2b2a28;"><span class="badge badge-danger"><i class="fa fa-trash"></i></span></a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>   
                                </tbody>
                            </table>
                        </div>
                        <!-- TABEL DATA OPD END -->

                        <!-- MODAL TAMBAH OPD START -->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data OPD</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="basic-form">
                                            <?php if (validation_errors()): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo validation_errors(); ?>
                                                </div>
                                            <?php endif; ?>
                                            <form action="<?=base_url()?>MasterUnitKerja/Tambah_OPD" method="post">
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label style="color:#313236">Kode Kabupaten/Kota</label>
                                                        <input type="text" class="form-control" name="BNCOID" autocomplete="off" disabled style="background-color:#f2f2f2;" value="<?=$kodekab->CNCOID;?>">
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        <label style="color:#313236">Kode Unit Kerja</label>
                                                        <input type="text" class="form-control" name="BNBUID" autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label style="color:#313236">Nama Unit Kerja</label>
                                                        <input type="text" class="form-control" name="BNDESB1" autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Tipe Unit Kerja</label>
                                                        <select class="form-control" name="BNBUTY" required>
                                                            <option value="" selected="true" disabled="disabled">- Pilih Tipe Unit Kerja -</option>
                                                            <?php foreach($tipe as $t) : ?>
                                                                <option value="<?=$t["DTDC"];?>"><?=$t["DTDESC1"];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Relasi Unit kerja</label>
                                                        <select class="form-control" name="BNBUID1">
                                                            <option value="" selected="true" disabled="disabled">- Pilih Relasi Unit Kerja -</option>
                                                            <option value="0">Tidak Ada</option>
                                                            <?php foreach($relasi as $r) : ?>
                                                                <option value="<?=$r["BNIDBUID"];?>"><?=$r["BNDESB1"];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Pimpinan</label>
                                                        <select class="form-control" name="BNCC01" required>
                                                            <option value="" selected="true" disabled="disabled">- Pilih Pimpinan Unit Kerja -</option>
                                                            <?php foreach($pimpinan as $pimpinan) : ?>
                                                                <option value="<?=$pimpinan['ADIDANUM'];?>"><?=$pimpinan['ADNM'];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Jabatan</label>
                                                        <select class="form-control" name="BNCC02" required>
                                                            <option value="" selected="true" disabled="disabled">- Pilih Jabatan -</option>
                                                            <?php foreach($jabatan as $j) : ?>
                                                                <option value="<?=$j['DTIDDC'];?>"><?=$j['DTDESC1'];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Pengurus Barang</label>
                                                        <select class="form-control" name="BNCC03" required>
                                                            <option value="" selected="true" disabled="disabled">- Pilih Pengurus Barang -</option>
                                                            <?php foreach($pengurus_barang as $pb) : ?>
                                                                <option value="<?=$pb['ADIDANUM'];?>"><?=$pb['ADNM'];?></option>
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
                        </div>
                    </div>
                    <!-- MODAL TAMBAH OPD END -->

                    <!-- MODAL EDIT OPD START -->
                    <!-- <?php foreach($unitkerja as $opd):?>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="basicModal<?=$opd["BNIDBUID"];?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data OPD</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="basic-form">
                                            <?php if (validation_errors()): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo validation_errors(); ?>
                                                </div>
                                            <?php endif; ?>
                                            <form action="<?=base_url('MasterUnitKerja/Edit_OPD/'.$opd['BNIDBUID'])?>" method="post">
                                                <input type="hidden" name="BNIDBUID" value="<?=$opd["BNIDBUID"];?>">
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label style="color:#313236">Kode Kabupaten/Kota</label>
                                                        <input type="text" class="form-control" name="BNCOID" autocomplete="off" disabled style="background-color:#f2f2f2;" value="<?=$kodekab->CNCOID;?>">
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        <label style="color:#313236">Kode Unit Kerja</label>
                                                        <input type="text" class="form-control" name="BNBUID" autocomplete="off" value="<?=$opd["BNBUID"];?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label style="color:#313236">Nama Unit Kerja</label>
                                                        <input type="text" class="form-control" name="BNDESB1" autocomplete="off" value="<?=$opd["BNDESB1"];?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Tipe Unit Kerja</label>
                                                        <select class="form-control" name="BNBUTY">
                                                            <option value="<?=$opd["DTDC"];?>" selected><?=$opd["DTDESC1"];?></option>
                                                            <?php foreach($tipe as $t) : ?>
                                                                <option value="<?=$t["DTDC"];?>"><?=$t["DTDESC1"];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Relasi Unit kerja</label>
                                                        <select class="form-control" name="BNBUID1">
                                                            <?php
                                                            if($opd["BNBUID1"] == 0) {?>
                                                                <option value="<?=$opd["BNIDBUID"]?>" selected="true" >Tidak Ada</option>
                                                            <?php } else {?>
                                                                <option value="<?=$opd["BNIDBUID"]?>" selected="true"><?=$opd["BNBUID1"]?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                            <option value="0">Tidak Ada</option>
                                                            <?php foreach($relasi as $r) : ?>
                                                                <option value="<?=$r["BNIDBUID"];?>"><?=$r["BNDESB1"];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Pimpinan</label>
                                                        <select class="form-control" name="BNCC01" required>
                                                            <option value="<?=$opd["BNCC01"]?>" selected="true"><?=$opd["BNCC01"]?></option>
                                                            <?php foreach($pimpinan as $p) : ?>
                                                                <option value="<?=$p['ADIDANUM'];?>"><?=$p['ADNM'];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Jabatan</label>
                                                        <select class="form-control" name="BNCC02" required>
                                                            <option value="<?=$opd["BNCC02"]?>" selected="true" ><?=$opd["BNCC02"]?></option>
                                                            <?php foreach($jabatan as $j) : ?>
                                                                <option value="<?=$j['DTIDDC'];?>"><?=$j['DTDESC1'];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Pengurus Barang</label>
                                                        <select class="form-control" name="BNCC03" required>
                                                            <option value="<?=$opd["BNCC03"]?>" selected="true"><?=$opd["BNCC03"]?></option>
                                                            <?php foreach($pengurus_barang as $pb) : ?>
                                                                <option value="<?=$pb['ADIDANUM'];?>"><?=$pb['ADNM'];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
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
                    <?php endforeach;?> -->
                    <!-- MODAL EDIT OPD END -->

                    <!-- MODAL EDIT OPD START 2 -->
                    <?php foreach($unitkerja as $opd):?>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="basicModal<?=$opd["BNIDBUID"];?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data OPD</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="basic-form">
                                            <?php if (validation_errors()): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo validation_errors(); ?>
                                                </div>
                                            <?php endif; ?>
                                            <form action="<?=base_url('MasterUnitKerja/Edit_OPD/'.$opd['BNIDBUID'])?>" method="post">
                                                <input type="hidden" name="BNIDBUID" value="<?=$opd["BNIDBUID"];?>">
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label style="color:#313236">Kode Kabupaten/Kota</label>
                                                        <input type="text" class="form-control" name="BNCOID" autocomplete="off" disabled style="background-color:#f2f2f2;" value="<?=$kodekab->CNCOID;?>">
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        <label style="color:#313236">Kode Unit Kerja</label>
                                                        <input type="text" class="form-control" name="BNBUID" autocomplete="off" value="<?=$opd["BNBUID"];?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label style="color:#313236">Nama Unit Kerja</label>
                                                        <input type="text" class="form-control" name="BNDESB1" autocomplete="off" value="<?=$opd["BNDESB1"];?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Tipe Unit Kerja</label>
                                                        <select class="form-control" name="BNBUTY">
                                                        <?php foreach($tipe as $t) : ?>
                                                            <?php if($t["DTDC"] == $opd["BNBUTY"]) {?>
                                                                <option value="<?=$opd["DTDC"];?>" selected><?=$opd["tipe"];?></option>
                                                            <?php } else {?>
                                                                <option value="<?=$t["DTDC"];?>"><?=$t["DTDESC1"];?></option>
                                                            <?php }?>
                                                        <?php endforeach;?>

                                                            <!-- <option value="<?=$opd["DTDC"];?>" selected><?=$opd["tipe"];?></option>
                                                            <?php foreach($tipe as $t) : ?>
                                                                <option value="<?=$t["DTDC"];?>"><?=$t["DTDESC1"];?></option>
                                                            <?php endforeach;?> -->
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label style="color:#313236">Relasi Unit kerja</label>
                                                        <select class="form-control" name="BNBUID1">
                                                            <?php
                                                                if($opd["BNBUID1"] == 0) {?>
                                                                        <option value="<?=$opd["BNIDBUID"]?>" selected>Tidak Ada</option>
                                                                        <?php foreach($relasi as $r) :?>
                                                                            <option value="<?=$r["BNIDBUID"]?>"><?=$r["BNDESB1"]?></option>
                                                                        <?php endforeach;?>
                                                                <?php } else {?>
                                                                    <option value="<?=$opd["BNIDBUID"]?>" selected>Tidak Ada</option>
                                                                    <?php foreach($relasi as $r) :?>
                                                                        <?php if($r["BNIDBUID"] == $opd["BNBUID1"]) {?>
                                                                            <option value="<?=$opd["BNIDBUID"]?>" selected><?=$opd["relasi_opd"];?></option>
                                                                        <?php }
                                                                        else {?>
                                                                            <option value="<?=$r["BNIDBUID"]?>"><?=$r["BNDESB1"]?></option>
                                                                        <?php }?>
                                                                    <?php endforeach;?>
                                                                <?php
                                                                }
                                                            ?>
                                                            <!-- <?php
                                                            if($opd["BNBUID1"] == 0) {?>
                                                                <option value="<?=$opd["BNIDBUID"]?>" selected="true" >Tidak Ada</option>
                                                            <?php } else {?>
                                                                <option value="<?=$opd["BNIDBUID"]?>" selected="true"><?=$opd["relasi_opd"]?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                            <option value="0">Tidak Ada</option>
                                                            <?php foreach($relasi as $r) : ?>
                                                                <option value="<?=$r["BNIDBUID"];?>"><?=$r["BNDESB1"];?></option>
                                                            <?php endforeach;?> -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Pimpinan</label>
                                                        <select class="form-control" name="BNCC01" required>
                                                        <?php
                                                        if($opd["BNCC01"] == NULL || $opd["BNCC01"] == 0) {?>
                                                            <option value="<?=$opd["BNCC01"];?>" selected>Belum Dipilih</option>
                                                            <?php foreach($pengurus_barang as $p) : ?>
                                                                <option value="<?=$p['ADIDANUM'];?>"><?=$p['ADNM'];?></option>
                                                            <?php endforeach;?>
                                                        <?php } else {?>
                                                            <option value="0">Belum Dipilih</option>
                                                            <?php foreach($pengurus_barang as $p) : ?>
                                                                <?php if($p['ADIDANUM'] == $opd["BNCC01"]) {?>
                                                                    <option value="<?=$opd["BNCC01"];?>" selected><?=$opd["pimpinan"];?></option>
                                                                <?php } else {?>
                                                                    <option value="<?=$p['ADIDANUM'];?>"><?=$p['ADNM'];?></option>
                                                                <?php }?>
                                                                
                                                            <?php endforeach;?>
                                                        <?php
                                                        }
                                                        ?>
                                                            <!-- <option value="<?=$opd["BNCC01"]?>" selected="true"><?=$opd["pimpinan"]?></option>
                                                            <?php foreach($pimpinan as $p) : ?>
                                                                <option value="<?=$p['ADIDANUM'];?>"><?=$p['ADNM'];?></option>
                                                            <?php endforeach;?> -->
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Jabatan</label>
                                                        <select class="form-control" name="BNCC02" required>
                                                        <?php
                                                        if($opd["BNCC02"] == NULL || $opd["BNCC02"] == 0) {?>
                                                            <option value="<?=$opd["BNCC02"];?>" selected>Belum Dipilih</option>
                                                            <?php foreach($jabatan as $j) : ?>
                                                                <option value="<?=$j['DTIDDC'];?>"><?=$j['DTDESC1'];?></option>
                                                            <?php endforeach;?>
                                                        <?php } else {?>
                                                            <option value="0">Belum Dipilih</option>
                                                            <?php foreach($jabatan as $j) : ?>
                                                                <?php if($j['DTIDDC'] == $opd["BNCC02"]) {?>
                                                                    <option value="<?=$opd["BNCC02"];?>" selected><?=$opd["jabatan"];?></option>
                                                                <?php } else {?>
                                                                    <option value="<?=$j['DTIDDC'];?>"><?=$j['DTDESC1'];?></option>
                                                                <?php }?>
                                                                
                                                            <?php endforeach;?>
                                                        <?php
                                                        }
                                                        ?>

                                                            <!-- <option value="<?=$opd["BNCC02"]?>" selected="true" ><?=$opd["jabatan"]?></option>
                                                            <?php foreach($jabatan as $j) : ?>
                                                                <option value="<?=$j['DTIDDC'];?>"><?=$j['DTDESC1'];?></option>
                                                            <?php endforeach;?> -->
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label style="color:#313236">Pengurus Barang</label>
                                                        <select class="form-control" name="BNCC03" required>
                                                        <?php
                                                        if($opd["BNCC03"] == NULL || $opd["BNCC03"] == 0) {?>
                                                            <option value="<?=$opd["BNCC03"];?>" selected>Belum Dipilih</option>
                                                            <?php foreach($pengurus_barang as $pb) : ?>
                                                                <option value="<?=$pb['ADIDANUM'];?>"><?=$pb['ADNM'];?></option>
                                                            <?php endforeach;?>
                                                        <?php } else {?>
                                                            <option value="0">Belum Dipilih</option>
                                                            <?php foreach($pengurus_barang as $pb) : ?>
                                                                <?php if($pb['ADIDANUM'] == $opd["BNCC03"]) {?>
                                                                    <option value="<?=$opd["BNCC03"];?>" selected><?=$opd["pengurus_barang"];?></option>
                                                                <?php } else {?>
                                                                    <option value="<?=$pb['ADIDANUM'];?>"><?=$pb['ADNM'];?></option>
                                                                <?php }?>
                                                                
                                                            <?php endforeach;?>
                                                        <?php
                                                        }
                                                        ?>

                                                            <!-- <option value="<?=$opd["BNCC03"]?>" selected="true"><?=$opd["pengurus_barang"]?></option>
                                                            <?php foreach($pengurus_barang as $pb) : ?>
                                                                <option value="<?=$pb['ADIDANUM'];?>"><?=$pb['ADNM'];?></option>
                                                            <?php endforeach;?> -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
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
                    <!-- MODAL EDIT OPD END -->

                    <!-- MODAL HAPUS OPD START-->
                    <?php foreach($unitkerja as $opd):?>
                        <div class="modal fade" id="basicModal2<?=$opd["BNIDBUID"];?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Data OPD</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="basic-form">
                                            <form method="post" action="<?=base_url('MasterUnitKerja/Hapus_OPD/'.$opd['BNIDBUID'])?>">
                                                <p style="color:#2b2a28;">Apakah Anda yakin ingin menghapus data OPD <b><?=$opd["BNDESB1"];?></b>?</p>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="BNCOID" value="<?=$opd["BNCOID"];?>">
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
                    <!-- MODAL HAPUS OPD END -->

                    <!-- MODAL DETAIL OPD START -->
                    <?php foreach($getAll as $ga):?>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="basicModalb<?=$ga["BNIDBUID"];?><?=$ga["BNBUID1"]?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail OPD</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Kode Kabupaten/Kota :</b></label>
                                                <p style="color:#313236"><?=$kodekab->CNCOID;?> - <?=$kodekab->CNDESB1;?></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Kode Unit Kerja :</b></label>
                                                <p style="color:#313236"><?=$ga["BNBUID"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Nama Unit Kerja :</b></label>
                                                <p style="color:#313236"><?=$ga["BNDESB1"];?></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Tipe Unit Kerja :</b></label>
                                                <p style="color:#313236"><?=$ga["tipe"];?></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Relasi Unit Kerja :</b></label>
                                                <?php
                                                if($ga["BNBUID1"] == 0) {?>
                                                    <p style="color:#313236">Tidak Ada</p>
                                                <?php } else {?>
                                                    <p style="color:#313236"><?=$ga["relasi_opd"];?></p>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Pimpinan :</b></label>
                                                <?php
                                                if($ga["BNCC01"] == 0 || $ga["BNCC01"] == NULL) {?>
                                                    <p style="color:#313236">Belum Dipilih</p>
                                                <?php } else {?>
                                                    <p style="color:#313236"><?=$ga["pimpinan"];?></p>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Jabatan :</b></label>
                                                <?php
                                                if($ga["BNCC02"] == 0 || $ga["BNCC02"] == NULL) {?>
                                                    <p style="color:#313236">Belum Dipilih</p>
                                                <?php } else {?>
                                                    <p style="color:#313236"><?=$ga["jabatan"];?></p>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#2b2a28;"><b>Pengurus Barang :</b></label>
                                                <?php
                                                if($ga["BNCC03"] == 0 || $ga["BNCC03"] == NULL) {?>
                                                    <p style="color:#313236">Belum Dipilih</p>
                                                <?php } else {?>
                                                    <p style="color:#313236"><?=$ga["pengurus_barang"];?></p>
                                                <?php
                                                }
                                                ?>
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
                    <!-- MODAL DETAIL OPD END -->
                </div>
            </div>
        </div>
    </div>
</div>