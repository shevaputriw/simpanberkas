<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");
?>
<h2><center>Data yang Dicetak</center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
        <th>No</th>
        <th>Nomor Dokumen</th>
        <th>OPD</th>
        <th>Tanggal Dokumen</th>
	</tr>
	<?php $no=1; foreach($getData as $gt):?>
                                        <tr>
                                        <td><?=$no++;?></td>
                                        <td><?=$gt["OVDOCNO"];?></td>
                                        <td><?=$gt["BNDESB1"];?></td>
                                        <td><?= date('d-m-Y', strtotime($gt["OVDOCDT"])); ?></td>
                                        
		</tr>
		<?php
	endforeach;
	?>
</table>

