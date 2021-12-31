
<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">PARTNER BISNIS</h4></center>
                    </div>
                    <div class="card-body">
                        <a href="<?=base_url()?>PartnerBisnis/Tambah_PartnerBisnis"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Tambah Partner Bisnis</button></a>
                        <!-- <button type="button" class="btn btn-primary" style="float:right;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Detail Pencarian Data &nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></button> -->
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
                        </div>

                        <!-- TABEL PARTNER BISNIS START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th><center>No</center></th>
                                        <th><center>No. Identitas</center></th>
                                        <th><center>Nama</center></th>
                                        <th><center>Tipe</center></th>
                                        <th><center>Email</center></th>
                                        <th><center>No. Telp</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($get_t0101 as $gt):?>
                                        <tr>
                                        <td><center><?=$no++;?></center></td>
                                        <td><center><?=$gt["ADANUM"];?></center></td>
                                        <td><?=$gt["ADNM"];?></td>
                                        <td><center><?=$gt["tipe"];?></center></td>
                                        <td><?=$gt["ADEMAIL"];?></td>
                                        <td><center><?=$gt["ADPHNO1"];?></center></td>
                                        <td>
                                        <center>
                                            <!-- DETAIL -->
                                            <a data-toggle="modal" href="#basicModalb<?=$gt["ADIDANUM"];?>" class="pd-setting-ed" style="color:#2b2a28;" title="Lihat Detail"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                            <!-- EDIT -->
                                            <a href="<?=base_url()?>PartnerBisnis/EditPartner/<?=$gt['ADIDANUM'];?>" class="pd-setting-ed" style="color:#000000;" title="Edit"><span class="badge badge-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>

                                            <!-- HAPUS -->
                                            <a data-toggle="modal" href="#basicModal2<?=$gt["ADIDANUM"];?>" title="Hapus" style="color:#2b2a28;"><span class="badge badge-danger"><i class="fa fa-trash"></i></span></a>
                                            </center>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- TABEL PARTNER BISNIS END -->

                        <!-- MODAL HAPUS PARTNER BISNIS START -->
                        <?php foreach($get_t0101 as $gt):?>
                            <div class="modal fade" id="basicModal2<?=$gt["ADIDANUM"];?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Data Partner Bisnis</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="basic-form">
                                                <form method="post" action="<?=base_url('PartnerBisnis/HapusPartner/'.$gt['ADIDANUM'])?>">
                                                    <p style="color:#2b2a28;">Apakah Anda yakin ingin menghapus data <b><?=$gt["ADNM"];?></b>?</p>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="ADIDANUM" value="<?=$gt["ADIDANUM"];?>">
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
                        <!-- MODAL HAPUS PARTNER BISNIS END -->

                        <!-- MODAL DETAIL PARTNER BISNIS START -->
                        <?php foreach($get_t0101 as $gt):?>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="basicModalb<?=$gt["ADIDANUM"];?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Partner Bisnis</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>No. Identitas :</b></label>
                                                    <p style="color:#313236"><?=$gt["ADANUM"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Nama :</b></label>
                                                    <p style="color:#313236"><?=$gt["ADNM"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Tipe :</b></label>
                                                    <p style="color:#313236"><?=$gt["tipe"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Parent ID :</b></label>
                                                    <p style="color:#313236"><?=$gt["ADPAN"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Alamat :</b></label>
                                                    <p style="color:#313236"><?=$gt["ADADDR"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>Email :</b></label>
                                                    <p style="color:#313236"><?=$gt["ADEMAIL"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>No. Telp :</b></label>
                                                    <p style="color:#313236"><?=$gt["ADPHNO1"];?></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color:#2b2a28;"><b>N.P.W.P. :</b></label>
                                                    <p style="color:#313236"><?=$gt["ADTAXID"];?></p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Hutang :</b></label>
                                                    <?php
                                                    if($gt["ADAP"] == NULL) {?>
                                                        <p style="color:#313236">Belum Dipilih</p>
                                                    <?php } else {?>
                                                        <p style="color:#313236"><?=$gt["ADAP"];?></p>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Piutang :</b></label>
                                                    <?php
                                                    if($gt["ADAR"] == NULL) {?>
                                                        <p style="color:#313236">Belum Dipilih</p>
                                                    <?php } else {?>
                                                        <p style="color:#313236"><?=$gt["ADAR"];?></p>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Karyawan :</b></label>
                                                    <?php
                                                    if($gt["ADEMPL"] == NULL) {?>
                                                        <p style="color:#313236">Belum Dipilih</p>
                                                    <?php } else {?>
                                                        <p style="color:#313236"><?=$gt["ADEMPL"];?></p>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Pimpinan :</b></label>
                                                    <?php
                                                    if($gt["ADCC01"] == NULL || $gt["ADCC01"] == 0) {?>
                                                        <p style="color:#313236">Belum Dipilih</p>
                                                    <?php } else {?>
                                                        <p style="color:#313236"><?=$gt["pimpinan"];?></p>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Jabatan :</b></label>
                                                    <?php
                                                    if($gt["ADCC02"] == NULL || $gt["ADCC02"] == 0) {?>
                                                        <p style="color:#313236">Belum Dipilih</p>
                                                    <?php } else {?>
                                                        <p style="color:#313236"><?=$gt["jabatan"];?></p>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label style="color:#2b2a28;"><b>Pengurus Barang :</b></label>
                                                    <?php
                                                    if($gt["ADCC03"] == NULL || $gt["ADCC03"] == 0) {?>
                                                        <p style="color:#313236">Belum Dipilih</p>
                                                    <?php } else {?>
                                                        <p style="color:#313236"><?=$gt["pengurus_barang"];?></p>
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
                        <!-- MODAL DETAIL PARTNER BISNIS END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>