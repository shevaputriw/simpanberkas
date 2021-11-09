<!DOCTYPE html>
<html>
<head>
<?php $no=1; foreach($getData as $gt):?>
        <?php
        $tanggal = $gt["OVDOCDT"];
        $split = explode("-", $tanggal);
        $y = $split[0];
        $m = $split[1];
        $d = $split[2];
        $date =  substr($d, 0, 2);
        
        switch ($m)
        {
                case "01":
                $bln="Januari";
                break;
                case "02":
                $bln="Februari";
                break;
                case "03":
                $bln="Maret";
                break;
                case "04":
                $bln="April";
                break;
                case "05":
                $bln="Mei";
                break;
                case "06":
                $bln="Juni";
                break;
                case "07":
                $bln="Juli";
                break;
                case "08":
                $bln="Agustus";
                break;
                case "09":
                $bln="September";
                break;
                case "10":
                $bln="Oktober";
                break;
                case "11":
                $bln="November";
                break;
                case "12":
                $bln="Desember";
                break;
        }
        // $x = $d $bln $y;
        ?>
	<title><?=$title;?></title>
	<style type="text/css">
		table {
			/* border-style: double; */
			border-width: 1px;
			border-color: black;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body>
	<center>
		<table>
			<tr>
				<td><img src="<?=base_url()?>/assets/focus/images/logo_kab.png" width="90" height="110"></td>
				<td>
				<center>
					<font size="4">LEMBAGA PERATIKUM 2019</font><br>
					<font size="5" style="color:red;"><b><?=$gt["BNDESB1"];?></b></font><br>
					<font size="2">Bidang Keahlian : Bisnis dan Menejemen - Teknologi informasi dan Komunikasi</font><br>
					<font size="2"><i>Jln Cut Nya'Dien No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Tempurejo Jember Jawa Timur</i></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
		<table style="float:right;">
			<tr>
				<td class="text2" id="OVDOCDT" style="color:red;">Mojokerto, <?=$date; ?> <?=$bln; ?> <?=$y; ?></td>
			</tr>
		</table>
		</table>
		<table>
			<tr class="text2">
				<td width="80">Nomor Dokumen</td>
				<td width="572" style="color:red;">: <?=$gt["OVDOCNO"];?></td>
			</tr>
			<tr>
				<td>Perihal</td>
				<td width="564">: Berita Acara</td>
			</tr>
		</table>
		<br>
		<table >
			<tr>
		       <td>
			       <font size="2">Kpd yth.<br>Di tempat</font>
		       </td>
		    </tr>
		</table>
		<br>
		<table >
			<tr>
		       <td>
			       <font size="2">Assalamu'alaikum wr.wb<br>Jumlah barang : <p style="color:red;"><?=$gt["total_berkas"];?></p></font>
		       </td>
		    </tr>
		</table>
		<br>
		</table>
		<!-- <table>
			<tr class="text2">
				<td>Hari Tanggal</td>
				<td width="541">: <b>Selasa/16 mei 2019</b></td>
			</tr>
			<tr>
				<td>Jam</td>
				<td width="525">: 08:30</td>
			</tr>
			<tr>
				<td>Tempat</td>
				<td width="525">: Ruang lap komputer</td>
			</tr>
		</table> -->
                <table border="1" width="100%" style="text-align:center;color:red;">
                <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Jenis Berkas</th>
                                        <th>Nama Barang</th>
                                        <th>Lokasi Barang</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($get_berkas2 as $gb):?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$gb["OVINUM"];?></td>
                                            <td><?=$gb["DTDESC1"];?></td>
                                            <td><?=$gb["OVDESB1"];?></td>
                                            <td><?=$gb["OVLOCID"];?></td>
                                        
                                        
		</tr>
		<?php
	endforeach;
	?>
</table>
		<br>
		<table >
			<tr>
		       <td>
			       <font size="2">Wassalamu'alaikum wr.wb.
</font>
		       </td>
		    </tr>
		</table>
		<br>
		<table >
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Mengetahui,<br><p style="color:red;"><?=$gt["jabatan"];?></p><br><br><br><br><p style="color:red;"><?=$gt["pimpinan"];?></p></td>
                                <br><br><br><br>
			</tr>
	     </table>
	</center>
        <?php
	endforeach;
	?>
</body>
</html>