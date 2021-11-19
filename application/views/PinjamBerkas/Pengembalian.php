<div class="content-body btn-page" style="margin-top:-4%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <center><h4 class="card-title">PENGEMBALIAN BERKAS</h4></center>
                    </div>
                    <div class="card-body">
                        <!-- TABEL BERKAS BARU START -->
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="example" class="display" style="min-width: 845px;color:#4b4b4b;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>OPD</th>
                                        <th>Jenis Berkas</th>
                                        <th>Nama Barang</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($berkas_keluar as $bk):?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$bk["BNDESB1"];?></td>
                                            <td><?=$bk["DTDESC1"];?></td>
                                            <td><?=$bk["ITDESB1"];?></td>
                                            <td><span class="badge badge-warning"><?=$bk["e"];?></span></td>
                                            <td>
                                                <!-- IDBUID = OPD; DOCONO = Nomor Dokumen OV;  DOCNO = Nomor Dokumen IT -->
                                                <a href="<?=base_url()?>PinjamBerkas/Kembali/<?=$bk["ITIDBUID"];?>/<?=$bk["ITDOCONO"];?>/<?=$bk["ITDOCOTY"];?>/<?=$bk["ITDOCOSQ"];?>/<?=$bk["ITDOCNO"];?>/<?=$bk["ITDOCSQ"];?>" style="color:#000000;"><span class="badge badge-primary">Kembali</span></a>
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