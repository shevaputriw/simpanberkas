
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
                        <button type="button" class="btn btn-primary" style="float:right;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Detail Pencarian Data &nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></button>
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
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>OPD</th>
                                        <th>Kode Gudang</th>
                                        <th>No. Rak</th>
                                        <th>Baris</th>
                                        <th>Kolom</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>3</td>
                                        <td>Lorem</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
                                            <form action="#" method="post">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label>Unit Kerja/OPD</label>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>Choose...</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label>Kode Gudang</label>
                                                        <input type="text" class="form-control" name="" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>No. Rak</label>
                                                        <input type="email" class="form-control" name="" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>No. Baris</label>
                                                        <input type="text" class="form-control" name="" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>No. Kolom</label>
                                                        <input type="text" class="form-control" name="" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Keterangan</label>
                                                        <input type="text" class="form-control" name="" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Kapasitas</label>
                                                        <input type="text" class="form-control" name="" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Satuan Volume</label>
                                                            <select id="inputState" class="form-control">
                                                                <option selected>Choose...</option>
                                                                <option>Option 1</option>
                                                                <option>Option 2</option>
                                                                <option>Option 3</option>
                                                            </select>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>