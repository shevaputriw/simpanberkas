<div class="content-body" style="margin-bottom:-8%;">
    <div class="container-fluid" style="margin-top:-4%;">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4>EDIT PARTNER BISNIS</h4></center>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?=base_url('PartnerBisnis/EditPartner/'.$pb['ADIDANUM'])?>" method="post">
                                <?php if (validation_errors()): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo validation_errors(); ?>
                                    </div>
                                <?php endif; ?>
                                <input type="hidden" name="ADIDANUM" value="<?=$pb["ADIDANUM"]?>">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236">No. Identitas (NIK/Passport/KTP)</label>
                                        <input type="text" class="form-control" name="ADANUM" autocomplete="off" value="<?=$pb["ADANUM"]?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236">Nama</label>
                                        <input type="text" class="form-control" name="ADNM" autocomplete="off" value="<?=$pb["ADNM"]?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236">Tipe</label>
                                        <select class="form-control" name="ADST" required>
                                            <option value="<?=$pb["DTDC"];?>" selected><?=$pb["tipe"];?></option>
                                            <?php foreach($tipe as $t) : ?>
                                                <option value="<?=$t["DTDC"];?>"><?=$t["DTDESC1"];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236">Parent ID</label>
                                        <input type="text" class="form-control" name="ADPAN" autocomplete="off" value="<?=$pb["ADPAN"]?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236">Alamat</label>
                                        <input type="text" class="form-control" name="ADADDR" autocomplete="off" value="<?=$pb["ADADDR"]?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236">Email</label>
                                        <input type="email" class="form-control" name="ADEMAIL" autocomplete="off" value="<?=$pb["ADEMAIL"]?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236">No. Telp</label>
                                        <input type="text" class="form-control" name="ADPHNO1" autocomplete="off" value="<?=$pb["ADPHNO1"]?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="color:#313236">N.P.W.P.</label>
                                        <input type="text" class="form-control" name="ADTAXID" autocomplete="off" value="<?=$pb["ADTAXID"]?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label style="color:#313236">Hutang</label>
                                        <select class="form-control" name="ADAP">
                                            <?php
                                                if($pb["ADAP"] == NULL) {?>
                                                    <option value="<?=$pb["ADAP"]?>" selected>- Pilih -</option>
                                                    <?php foreach($hutang as $h) : ?>
                                                        <option value="<?=$h?>"><?=$h?></option>
                                                    <?php endforeach;?>
                                                <?php } else {?>
                                                    <?php foreach($hutang as $h) :?>
                                                        <?php if($h == $pb["ADAP"]) {?>
                                                            <option value="<?=$pb["ADAP"];?>" selected><?=$pb["ADAP"];?></option>
                                                        <?php } else {?>
                                                            <option value="<?=$h?>"><?=$h?></option>
                                                        <?php }?>
                                                    <?php endforeach;?>
                                                <?php
                                                }
                                            ?>

                                            <!-- <?php
                                            if($pb["ADAP"] == NULL) {?>
                                                <option value="<?=$pb["ADAP"];?>" selected="true">- Pilih -</option>
                                            <?php } else {?>
                                                <option value="<?=$pb["ADAP"];?>" selected><?=$pb["ADAP"];?></option>
                                            <?php
                                            }
                                            ?>
                                            <?php foreach($hutang as $h) : ?>
                                                <option value="<?=$h?>"><?=$h?></option>
                                            <?php endforeach;?> -->
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:#313236">Piutang</label>
                                        <select class="form-control" name="ADAR">
                                            <?php
                                                if($pb["ADAR"] == NULL) {?>
                                                    <option value="<?=$pb["ADAR"]?>" selected>- Pilih -</option>
                                                    <?php foreach($piutang as $p) : ?>
                                                        <option value="<?=$p?>"><?=$p?></option>
                                                    <?php endforeach;?>
                                                <?php } else {?>
                                                    <?php foreach($piutang as $p) :?>
                                                        <?php if($p == $pb["ADAR"]) {?>
                                                            <option value="<?=$pb["ADAR"];?>" selected><?=$pb["ADAR"];?></option>
                                                        <?php } else {?>
                                                            <option value="<?=$p?>"><?=$p?></option>
                                                        <?php }?>
                                                    <?php endforeach;?>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:#313236">Karyawan</label>
                                        <select class="form-control" name="ADEMPL">
                                            <?php
                                                if($pb["ADEMPL"] == NULL) {?>
                                                    <option value="<?=$pb["ADEMPL"]?>" selected>- Pilih -</option>
                                                    <?php foreach($karyawan as $k) : ?>
                                                        <option value="<?=$k?>"><?=$k?></option>
                                                    <?php endforeach;?>
                                                <?php } else {?>
                                                    <?php foreach($karyawan as $k) :?>
                                                        <?php if($k == $pb["ADEMPL"]) {?>
                                                            <option value="<?=$pb["ADEMPL"];?>" selected><?=$pb["ADEMPL"];?></option>
                                                        <?php } else {?>
                                                            <option value="<?=$k?>"><?=$k?></option>
                                                        <?php }?>
                                                    <?php endforeach;?>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label style="color:#313236">Pimpinan</label>
                                        <select class="form-control" name="ADCC01">
                                            <?php
                                            if($pb["ADCC01"] == NULL || $pb["ADCC01"] == 0) {?>
                                                <option value="<?=$pb["ADCC01"];?>" selected>Tidak Ada</option>
                                                <?php foreach($pimpinan as $p) : ?>
                                                    <option value="<?=$p['ADIDANUM'];?>"><?=$p['ADNM'];?></option>
                                                <?php endforeach;?>
                                            <?php } else {?>
                                                <option value="0">Tidak Ada</option>
                                                <?php foreach($pimpinan as $p) : ?>
                                                    <?php if($p['ADIDANUM'] == $pb["ADCC01"]) {?>
                                                        <option value="<?=$pb["ADCC01"];?>" selected><?=$pb["pimpinan"];?></option>
                                                    <?php } else {?>
                                                        <option value="<?=$p['ADIDANUM'];?>"><?=$p['ADNM'];?></option>
                                                    <?php }?>
                                                    
                                                <?php endforeach;?>
                                            <?php
                                            }
                                            ?>
                                            
                                            <!-- <?php foreach($pimpinan as $p) : ?>
                                                <option value="<?=$p['ADIDANUM'];?>"><?=$p['ADNM'];?></option>
                                            <?php endforeach;?> -->
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:#313236">Jabatan</label>
                                        <select class="form-control" name="ADCC02">
                                            <?php
                                                if($pb["ADCC02"] == NULL || $pb["ADCC02"] == 0) {?>
                                                    <option value="<?=$pb["ADCC02"];?>" selected>Tidak Ada</option>
                                                    <?php foreach($jabatan as $j) : ?>
                                                        <option value="<?=$j['DTIDDC'];?>"><?=$j['DTDESC1'];?></option>
                                                    <?php endforeach;?>
                                                <?php } else {?>
                                                    <?php foreach($jabatan as $j) : ?>
                                                        <?php if($j['DTIDDC'] == $pb["ADCC02"]) {?>
                                                            <option value="<?=$pb["ADCC02"];?>" selected><?=$pb["jabatan"];?></option>
                                                        <?php } else {?>
                                                            <option value="<?=$j['DTIDDC'];?>"><?=$j['DTDESC1'];?></option>
                                                        <?php }?>
                                                        
                                                    <?php endforeach;?>
                                                <?php
                                                }
                                            ?>

                                            <!-- <?php
                                            if($pb["ADCC02"] == NULL || $pb["ADCC02"] == 0) {?>
                                                <option value="<?=$pb["ADCC02"];?>" selected="true">- Pilih -</option>
                                            <?php } else {?>
                                                <option value="<?=$pb["ADCC02"];?>" selected><?=$pb["jabatan"];?></option>
                                            <?php
                                            }
                                            ?>
                                            <option value="0">Tidak Ada</option>
                                            <?php foreach($jabatan as $j) : ?>
                                                <option value="<?=$j['DTIDDC'];?>"><?=$j['DTDESC1'];?></option>
                                            <?php endforeach;?> -->
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:#313236">Pengurus Barang</label>
                                        <select class="form-control" name="ADCC03">
                                            <?php
                                                if($pb["ADCC03"] == NULL || $pb["ADCC03"] == 0) {?>
                                                    <option value="<?=$pb["ADCC03"];?>" selected>Tidak Ada</option>
                                                    <?php foreach($pengurus_barang as $b) : ?>
                                                        <option value="<?=$b['ADIDANUM'];?>"><?=$b['ADNM'];?></option>
                                                    <?php endforeach;?>
                                                <?php } else {?>
                                                    <option value="0">Tidak Ada</option>
                                                    <?php foreach($pengurus_barang as $b) : ?>
                                                        <?php if($b['ADIDANUM'] == $pb["ADCC03"]) {?>
                                                            <option value="<?=$pb["ADCC03"];?>" selected><?=$pb["pengurus_barang"];?></option>
                                                        <?php } else {?>
                                                            <option value="<?=$b['ADIDANUM'];?>"><?=$b['ADNM'];?></option>
                                                        <?php }?>
                                                        
                                                    <?php endforeach;?>
                                                <?php
                                                }
                                            ?>

                                            <!-- <?php
                                            if($pb["ADCC03"] == NULL || $pb["ADCC03"] == 0) {?>
                                                <option value="NULL" selected="true">- Pilih -</option>
                                            <?php } else {?>
                                                <option value="<?=$pb["ADCC03"];?>"><?=$pb["pengurus_barang"];?></option>
                                            <?php
                                            }
                                            ?>
                                            <option value="0">Tidak Ada</option>
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
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>