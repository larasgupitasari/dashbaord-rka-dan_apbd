<!-- ------------------------------------------TABLE----------------------------------------------- -->

	<div class="container" style="margin-top: 55px">
		<div class="card mt-5">
			<div class="card-body">
				<h4>Realisasi Anggaran Belanja SKPD</h4>
				<br>
				<table id="tabel" class="table table-striped table-bordered" cellspacing="0" width="100%">
		        	<thead style="text-align: center;">
		        		<tr>
		              	<th> No.</th>
			              <th> Nama SKPD</th>
			              <th> Nama Sub SKPD</th>
			              <th> Nama Bidang</th>
			              <th> Nama Program</th>
			              <th> Nama Kegiatan</th>
			              <th> Nama Sub Kegiatan</th>
			              <th> Anggaran Belanja</th>
			              <th> Realisasi Anggaran </th>
			              <th> Persentase </th>
			            </tr>
			        </thead>
		          	<tbody>
						<?php
			            	$no=1;
			            	foreach ($getDataDetailBelanja as $data): ?>
			          		<tr>
				              <td><?php echo $no++;?>.</td>
				              <td><?php echo $data['nm_unit']; ?></td>
				              <td><?php echo $data['nm_sub_unit']; ?></td>
				              <td><?php echo $data['nm_bidang']; ?></td>
				              <td><?php echo $data['nm_program']; ?></td>
				              <td><?php echo $data['nm_kegiatan']; ?></td>
				              <td><?php echo $data['nm_sub_kegiatan']; ?></td>
				              <td>Rp.<?= number_format(($data['anggaran']), 0, ',','.'); ?></td>
				              <td>Rp.<?= number_format(($data['realisasi']), 0, ',','.'); ?></td>
				              <td><?php
				              	if($data['anggaran'] == 0 || $data['realisasi'] == 0){
				              		$prosentase = 0;
				              	}
				              	else{
				              		$prosentase = $data['realisasi']/$data['anggaran'];
				              	}

				               echo number_format(($prosentase*100), 2, ',', ''); ?>%</td>
				         	  </tr>
				         	<?php endforeach; ?>
		      		</tbody>
		  		</table>
			</div>
		</div> 
	</div>