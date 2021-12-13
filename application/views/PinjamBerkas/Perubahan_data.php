<?php 
    if($perubahan['OVMSTY'] == "1") { ?>
        <div class="content-body" style="margin-bottom:-9.6%;">
            <div class="container-fluid" style="margin-top:-4%;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-block">
                            </div>
                            <br>
                            <div class="basic-form">
                                <form action="<?=base_url('PinjamBerkas/Perubahan/'.$perubahan['FAICU'].'/'.$perubahan['ITDOCNO'])?>" method="post">
                                    <div class="card-body">
                                        <?php if (validation_errors()): ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo validation_errors(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <center><h4 class="card-title" style="margin-top:-40px;">PERUBAHAN DATA</h4></center>
                                        <input type="hidden" name="ITCOID" value="<?=$perubahan["FACOID"];?>">
                                        <input type="hidden" name="ITICU" value="<?=$perubahan["FAICU"];?>">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">OPD</label>
                                                <input type="text" class="form-control" name="ITIDBUID" value="<?=$perubahan["BNDESB1"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Kode Barang</label>
                                                <input type="text" class="form-control" name="ITINUM" value="<?=$perubahan["FAAOBJ"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Lokasi Barang</label>
                                                <input type="text" class="form-control" name="ITLOCID" value="<?=$perubahan["LMDESA2"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                        </div> 
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Jenis Berkas</label>
                                                <input type="text" class="form-control" name="ITMSTY" value="<?=$perubahan["jenis_berkas"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Nama Barang</label>
                                                <input type="text" class="form-control" name="ITDESB1" value="<?=$perubahan["FADESB1"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Nomor BPKB</label>
                                                <input type="text" class="form-control" name="ITCOMV" value="<?=$perubahan["FACOMV"];?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Merk</label>
                                                <input type="text" class="form-control" name="ITBRAND" value="<?=$perubahan["FABRAND"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Warna</label>
                                                <input type="text" class="form-control" name="ITCOLOR" value="<?=$perubahan["FACOLOR"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Kapasitas Mesin</label>
                                                <input type="text" class="form-control" name="ITCILCAP" value="<?=$perubahan["FACILCAP"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">No. Rangka</label>
                                                <input type="text" class="form-control" name="ITMFN" value="<?=$perubahan["FAMFN"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">No. Mesin</label>
                                                <input type="text" class="form-control" name="ITMACHNID" value="<?=$perubahan["FAMACHNID"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">No. Polisi</label>
                                                <input type="text" class="form-control" name="ITVHRN" value="<?=$perubahan["FAVHRN"];?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label style="color:#313236">Tanggal Akhir Pajak</label>
                                                <input type="date" class="form-control" name="ITVHTAXDT" value="<?php echo date('Y-m-d', strtotime($perubahan["FAVHTAXDT"])) ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label style="color:#313236">Tanggal Akhir STNK</label>
                                                <input type="date" class="form-control" name="ITVHRNTAXDT" value="<?php echo date('Y-m-d', strtotime($perubahan["FAVHRNTAXDT"])) ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <center>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan Data</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="<?=base_url()?>PinjamBerkas/Pengembalian"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Batal</button></a>
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
    <?php }
    else if($perubahan['OVMSTY'] = "2") { ?>
        <div class="content-body" style="margin-bottom:-9.6%;">
            <div class="container-fluid" style="margin-top:-4%;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-block">
                            </div>
                            <br>
                            <div class="basic-form">
                                <form action="<?=base_url('PinjamBerkas/Perubahan/'.$perubahan['FAICU'].'/'.$perubahan['ITDOCNO'])?>" method="post">
                                    <div class="card-body">
                                        <?php if (validation_errors()): ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo validation_errors(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <center><h4 class="card-title" style="margin-top:-40px;">PERUBAHAN DATA</h4></center><br>
                                        <input type="hidden" name="ITCOID" value="<?=$perubahan["FACOID"];?>">
                                        <input type="hidden" name="ITICU" value="<?=$perubahan["FAICU"];?>">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">OPD</label>
                                                <input type="text" class="form-control" name="ITIDBUID" value="<?=$perubahan["BNDESB1"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Kode Barang</label>
                                                <input type="text" class="form-control" name="ITINUM" value="<?=$perubahan["FAAOBJ"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Lokasi Barang</label>
                                                <input type="text" class="form-control" name="ITLOCID" value="<?=$perubahan["LMDESA2"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                        </div>  
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label style="color:#313236">Jenis Berkas</label>
                                                <input type="text" class="form-control" name="ITMSTY" value="<?=$perubahan["jenis_berkas"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">No. Serifikat</label>
                                                <input type="text" class="form-control" name="ITCRTFID" value="<?=$perubahan["FACRTFID"];?>" autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label style="color:#313236">Tanggal Serifikat</label>
                                                <input type="date" class="form-control" name="ITCRTFDT" value="<?php echo date('Y-m-d', strtotime($perubahan["FACRTFDT"])) ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label style="color:#313236">Status Kepemilikan</label>
                                                <input type="text" class="form-control" name="ITLNDOWNST" value="<?=$perubahan["FALNDOWNST"];?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Panjang</label>
                                                <input type="text" class="form-control" name="ITLENGTH" value="<?=$perubahan["FALENGTH"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Lebar</label>
                                                <input type="text" class="form-control" name="ITWIDTH" value="<?=$perubahan["FAWIDTH"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Luas</label>
                                                <input type="text" class="form-control" name="ITWIDE" value="<?=$perubahan["FAWIDE"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label style="color:#313236">Alamat</label>
                                                <input type="text" class="form-control" name="ITASADDR" value="<?=$perubahan["FAASADDR"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Kabupaten/Kota</label>
                                                <input type="text" class="form-control" name="ITCITY" value="<?=$perubahan["kabupaten"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Kecamatan</label>
                                                <input type="text" class="form-control" name="ITDIST" value="<?=$perubahan["kecamatan"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="color:#313236">Desa</label>
                                                <input type="text" class="form-control" name="ITSUBDIST" value="<?=$perubahan["desa1"];?>" style="background-color:#f2f2f2;" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <center>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan Data</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="<?=base_url()?>PinjamBerkas/Pengembalian"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Batal</button></a>
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
    <?php }
?>