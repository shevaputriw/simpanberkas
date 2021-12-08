<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">BERKAS YANG DIPINJAM</h4></center>
                    </div>
                    <div class="card-body">
                        <!-- TABEL BERKAS BARU START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>OPD</th>
                                        <th>Jenis Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($berkas_dipinjam as $bd):?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td> </td>
                                            <td> </td>
                                            <td><?=$bd["FADESB1"];?></td>
                                            <td></td>
                                            <td><span class="badge badge-danger">Belum Kembali</span></td>
                                            <td>
                                                <a href="<?=base_url()?>PinjamBerkas/form_perubahan_data/<?=$bd["FAICU"];?>/<?=$bd["ITDOCNO"];?>"><span class="badge badge-primary">Kembali</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- TABEL BERKAS BARU END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>