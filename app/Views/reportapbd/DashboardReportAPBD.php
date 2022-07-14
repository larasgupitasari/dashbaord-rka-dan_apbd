
<div style="height:70px"></div>

<div class="container">
	<div class="row">
		<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#pendapatan"><h4><b>Data Pendapatan</b></h4></button>
	</div>
</div>

<div id="pendapatan">
	<div class="container">
		<div class="row" class="container">
			<div class="col-md-6 " class="p-3 mb-5 rounded" id="pieChartPend" style="height: 300px; box-shadow: 0.5px 0.5px 7px grey;"></div>	
			<div class="col-md-6">
				<div class="p-2 mb-4 rounded" style="height: 60px; background: #B1BCE6  ; margin-top: 25px; box-shadow: 0.5px 0.5px 7px grey;"><b> Total Target Pendapatan Seluruh SKPD : Rp.<?= number_format(($summaryanggpendapatan[0]['anggaranpendapatan']), 0, ',', '.'); ?></b></div>
				<div class="p-2 mb-4 rounded" style="height: 60px; background:  #B7E5DD   ; margin-bottom: 25px; box-shadow: 0.5px 0.5px 7px grey;"><b> Capaian Realisasi Pendapatan Seluruh SKPD : Rp.<?= number_format(($summaryrealpendapatan[0]['realiasipendapatan']),0,',','.'); ?> </b></div>
				<div class="p-2 mb-4 rounded" style="height: 60px; background:  #F1F0C0   ; margin-bottom: 25px; box-shadow: 0.5px 0.5px 7px grey;"><b> Sisa Target Pendapatan : Rp.<?php

					$sisa = (int)$summaryanggpendapatan[0]['anggaranpendapatan'] - (int)$summaryrealpendapatan[0]['realiasipendapatan'];
					if((int)$sisa <= 0 ){
						$sisa = 0;
					}
					else{
						$sisa = $sisa;
					}

					echo number_format(($sisa),0,',','.'); ?> </b></div>
			</div>
		</div>
	</div>


	<!----------------------------------------- DIAGRAM BAR ---------------------------------------------->
	<div class="container">
		<div id="barChartpend" class="p-3 mt-5 rounded" style="box-shadow: 0.5px 0.5px 7px grey;">
		</div>
	</div>

	<!-- ------------------------------------------TABLE----------------------------------------------- -->

	<div class="container" style="margin-top: 55px">
		<div class="card mt-5">
			<div class="card-body">
				<h4>Realisasi Pendapatan Seluruh SKPD</h4>
				<br>
				<table id="tabel" class="table table-striped table-bordered" cellspacing="0" width="100%">
		        	<thead style="text-align: center;">
		        		<tr>
		              	<th> No.</th>
			              <th> Nama SKPD</th>
			              <th> Target Pendapatan </th>
			              <th> Realisasi Pendapatan </th>
			              <th> Persentase </th>
			            </tr>
			        </thead>
		          	<tbody>
						<?php
			            	$no=1;
			            	foreach ($getDataRealPendapatan as $data): ?>
			          		<tr>
				              <td><?php echo $no++;?>.</td>
				              <td><?= $data['nm_unit']; ?></td>
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
</div>

&nbsp;
<div class="container">
	<div class="row">
		<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#belanja"><h4><b>Data Belanja</b></h4></button>
	</div>
</div>

<div id="belanja" class="collapse">
	<div class="container">
		<div class="row" class="container">
			<div class="col-md-6 " class="p-3 mb-5 rounded" id="pieChartBel" style="height: 300px; box-shadow: 0.5px 0.5px 7px grey;"></div>	
			<div class="col-md-6">
				<div class="p-2 mb-4 rounded" style="height: 60px; background: #B1BCE6  ; margin-top: 25px; box-shadow: 0.5px 0.5px 7px grey;"><b> Total Anggaran Belanja Seluruh SKPD : Rp.<?= number_format(($summaryanggbelanja[0]['anggaranbelanja']), 0, ',', '.'); ?></b></div>
				<div class="p-2 mb-4 rounded" style="height: 60px; background:  #B7E5DD   ; margin-bottom: 25px; box-shadow: 0.5px 0.5px 7px grey;"><b> Capaian Realisasi Anggaran Belanja Seluruh SKPD : Rp.<?= number_format(($summaryrealbelanja[0]['realiasibelanja']),0,',','.'); ?> </b></div>
				<div class="p-2 mb-4 rounded" style="height: 60px; background:  #F1F0C0   ; margin-bottom: 25px; box-shadow: 0.5px 0.5px 7px grey;"><b> Sisa Anggaran Belanja : Rp.<?php

					$sisa = (int)$summaryanggbelanja[0]['anggaranbelanja'] - (int)$summaryrealbelanja[0]['realiasibelanja'];
					if($sisa <=0 ){
						$sisa = 0;
					}
					else{
						$sisa = $sisa;
					}

					echo number_format(($sisa),0,',','.'); ?> </b></div>
			</div>
		</div>
	</div>


	<!----------------------------------------- DIAGRAM BAR ---------------------------------------------->
	<div class="container">
		<div id="barChartbel" class="p-3 mt-5 rounded" style="box-shadow: 0.5px 0.5px 7px grey;">
		</div>
	</div>

	<!-- ------------------------------------------TABLE----------------------------------------------- -->

	<div class="container" style="margin-top: 55px">
		<div class="card mt-5">
			<div class="card-body">
				<h4>Realisasi Anggaran Belanja Seluruh SKPD</h4>
				<br>
				<table id="tabel2" class="table table-striped table-bordered" cellspacing="0" width="100%">
		        	<thead style="text-align: center;">
		        		<tr>
		              	<th> No.</th>
			              <th> Nama SKPD</th>
			              <th> Anggaran Belanja</th>
			              <th> Realisasi Anggaran </th>
			              <th> Persentase </th>
			            </tr>
			        </thead>
		          	<tbody>
						<?php
			            	$no=1;
			            	foreach ($getDataRealBelanja as $data): ?>
			          		<tr>
				              <td><?php echo $no++;?>.</td>
				              <td><?php echo "<a href='".base_url().'/DashboardAPBD/DetailBelanja/'.$data['kd_unit']."'>".$data['nm_unit'].""; ?></td>
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
</div>

&nbsp;
<div class="container">
	<div class="row">
		<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#pembiayaan"><h4><b>Data Pembiayaan</b></h4></button>
	</div>
</div>

<div id="pembiayaan" class="collapse">
	<div class="container">
		<div class="row" class="container">
			<div class="col-md-6 " class="p-3 mb-5 rounded" id="pieChartPem" style="height: 300px; box-shadow: 0.5px 0.5px 7px grey;"></div>	
			<div class="col-md-6">
				<div class="p-2 mb-4 rounded" style="height: 60px; background: #B1BCE6  ; margin-top: 25px; box-shadow: 0.5px 0.5px 7px grey;"><b> Total Pembiayaan Seluruh SKPD : Rp.<?= number_format(($summaryanggpembiayaan[0]['anggaranpembiayaan']), 0, ',', '.'); ?></b></div>
				<div class="p-2 mb-4 rounded" style="height: 60px; background:  #B7E5DD   ; margin-bottom: 25px; box-shadow: 0.5px 0.5px 7px grey;"><b> Capaian Realisasi Pembiyaan Seluruh SKPD : Rp.<?= number_format(($summaryrealpembiayaan[0]['realiasipembiayaan']),0,',','.'); ?> </b></div>
				<div class="p-2 mb-4 rounded" style="height: 60px; background:  #F1F0C0   ; margin-bottom: 25px; box-shadow: 0.5px 0.5px 7px grey;"><b> Sisa Pembiyaan : Rp.<?php

					$sisa = (int)$summaryanggpembiayaan[0]['anggaranpembiayaan'] - (int)$summaryrealpembiayaan[0]['realiasipembiayaan'];
					if($sisa <=0 ){
						$sisa = 0;
					}
					else{
						$sisa = $sisa;
					}

					echo number_format(($sisa),0,',','.'); ?> </b></div>
			</div>
		</div>
	</div>


	<!-- ------------------------------------------TABLE----------------------------------------------- -->

	<div class="container" style="margin-top: 55px">
		<div class="card mt-5">
			<div class="card-body">
				<h4>Realisasi Pembiayaan Seluruh SKPD</h4>
				<br>
				<table id="tabel3" class="table table-striped table-bordered" cellspacing="0" width="100%">
		        	<thead style="text-align: center;">
		        		<tr>
		              	<th> No.</th>
			              <th> Nama SKPD</th>
			              <th> Target Pendapatan </th>
			              <th> Realisasi Pendapatan </th>
			              <th> Persentase </th>
			            </tr>
			        </thead>
		          	<tbody>
						<?php
			            	$no=1;
			            	foreach ($getDataRealPembiayaan as $data): ?>
			          		<tr>
				              <td><?php echo $no++;?>.</td>
				              <td><?= $data['nm_unit']; ?></td>
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
</div>



<!-- PIE CHART -->
<script>
	Highcharts.chart('pieChartPend', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Realisasi Pendapatan APBD Kabupaten Tuban'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
        	valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
            	fontsize: '100pt',
                enabled: true
            },
            showInLegend : true
        }
    },
    series: [{
        name: 'Persentase',
        colorByPoint: true,
        dataLabels:{
        	style:{
        		fontSize:14
        	}
        },
        data: [{
            name: 'Realisasi',
            y: <?php  echo number_format(($summaryrealpendapatan[0]['realiasipendapatan']/$summaryanggpendapatan[0]['anggaranpendapatan']*100), 2, '.', ''); ?> 
        }, {
            name: 'Belum Realisasi',
            y: 100-<?php echo number_format(($summaryrealpendapatan[0]['realiasipendapatan']/$summaryanggpendapatan[0]['anggaranpendapatan']*100), 2, '.', ''); ?>
        }]
    }]
});

</script>

<script>
	Highcharts.chart('pieChartBel', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Realisasi Belanja APBD  Kabupaten Tuban'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
        	valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
            	fontsize: '100pt',
                enabled: true
            },
            showInLegend : true
        }
    },
    series: [{
        name: 'Persentase',
        colorByPoint: true,
        dataLabels:{
        	style:{
        		fontSize:14
        	}
        },
        data: [{
            name: 'Realisasi',
            y: <?php  echo number_format(($summaryrealbelanja[0]['realiasibelanja']/$summaryanggbelanja[0]['anggaranbelanja']*100), 2, '.', ''); ?> 
        }, {
            name: 'Belum Realisasi',
            y: 100-<?php echo number_format(($summaryrealbelanja[0]['realiasibelanja']/$summaryanggbelanja[0]['anggaranbelanja']*100), 2, '.', ''); ?>
        }]
    }]
});

</script>

<script>
	Highcharts.chart('pieChartPem', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Realisasi Pembiayaan APBD Kabupaten Tuban'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
        	valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
            	fontsize: '100pt',
                enabled: true
            },
            showInLegend : true
        }
    },
    series: [{
        name: 'Persentase',
        colorByPoint: true,
        dataLabels:{
        	style:{
        		fontSize:14
        	}
        },
        data: [{
            name: 'Realisasi',
            y: <?php  echo number_format(($summaryrealpembiayaan[0]['realiasipembiayaan']/$summaryanggpembiayaan[0]['anggaranpembiayaan']*100), 2, '.', ''); ?> 
        }, {
            name: 'Belum Realisasi',
            y: 100-<?php echo number_format(($summaryrealpembiayaan[0]['realiasipembiayaan']/$summaryanggpembiayaan[0]['anggaranpembiayaan']*100), 2, '.', ''); ?>
        }]
    }]
});

</script>

<script>
	Highcharts.chart('barChartpend', {
		colors: ['orange'],
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: '10 Besar Capaiaan Data Pendapatan'
	    },
	    xAxis: {
	        type: 'category',
	        labels: {
	            rotation: -45,
	            style: {
	                fontSize: '13px',
	                fontFamily: 'Verdana, sans-serif'
	            }
	        }
	    },
	    yAxis: {
	        min: 0,
	        title: {
	        	style:{ 
	        		fontSize:16
	        	},
	            text: 'Persentase Capaian (%)'
	        }
	    },
	    legend: {
	        enabled: false
	    },
	    tooltip: {
	        pointFormat: 'Capaian : <b>{point.y:.1f} %</b>'
	    },
	    series: [{
	        name: 'SKPD',
	        data: [
							<?php foreach ($get10DataRealPendapatan as $data){
						     	$nama = (string) $data['name1'];
							   	$prs = (float) number_format(($data['realisasi']/$data['anggaran']*100), 2, '.', '');
							   	$data = [$nama,$prs];
							   	echo json_encode($data),",";
							}
							?>
	        ],
	        dataLabels: {
	            enabled: false,
	            rotation: -90,
	            color: '#FFFFFF',
	            align: 'right',
	            format: '{point.y:.1f}', // one decimal
	            y: 10, // 10 pixels down from the top
	            style: {
	                fontSize: '13px',
	                fontFamily: 'Verdana, sans-serif'
	            }
	        }
	    }]
	});

</script>

<script>
	Highcharts.chart('barChartbel', {
		colors: ['orange'],
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: '10 Besar Capaiaan Data Belanja'
	    },
	    xAxis: {
	        type: 'category',
	        labels: {
	            rotation: -45,
	            style: {
	                fontSize: '13px',
	                fontFamily: 'Verdana, sans-serif'
	            }
	        }
	    },
	    yAxis: {
	        min: 0,
	        title: {
	        	style:{ 
	        		fontSize:16
	        	},
	            text: 'Persentase Penyerapan (%)'
	        }
	    },
	    legend: {
	        enabled: false
	    },
	    tooltip: {
	        pointFormat: 'Penyerapan : <b>{point.y:.1f} %</b>'
	    },
	    series: [{
	        name: 'SKPD',
	        data: [
							<?php foreach ($get10DataRealBelanja as $data){
						     	$nama = (string) $data['name1'];
							   	$prs = (float) number_format(($data['realisasi']/$data['anggaran']*100), 2, '.', '');
							   	$data = [$nama,$prs];
							   	echo json_encode($data),",";
							}
							?>
	        ],
	        dataLabels: {
	            enabled: false,
	            rotation: -90,
	            color: '#FFFFFF',
	            align: 'right',
	            format: '{point.y:.1f}', // one decimal
	            y: 10, // 10 pixels down from the top
	            style: {
	                fontSize: '13px',
	                fontFamily: 'Verdana, sans-serif'
	            }
	        }
	    }]
	});

</script>
