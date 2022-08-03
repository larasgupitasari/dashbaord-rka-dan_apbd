<?php foreach ($Anggaran as $ang): ?>
<?php endforeach; ?>

<?php foreach ($Realisasi as $real): ?>
<?php endforeach; ?>

<title><?php echo $bulan; ?></title>

<div class="container" style="padding:10px">
	<h5> Realisasi Belanja SKPD Berdasarkan Anggaran Kas Bulan <?php echo $bulan; ?> Tahun Anggaran 2022 </h5>
	<hr style="height:5px; border-width:0; color:gray; background-color:gray">
</div>

<div class="container"> 
	<div class="dropdown show" style="float: right; box-shadow: 0.5px 0.5px 7px grey;" class="col-md-6">
	<a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Pilih Bulan
	</a>

	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		<a class="dropdown-item" href="<?= base_url();?>\AnggaranKasJanuari">Januari</a>
		<a class="dropdown-item" href="<?= base_url();?>\AnggaranKasFebruari">Februari</a>
		<a class="dropdown-item" href="<?= base_url();?>\AnggaranKasMaret">Maret</a>
		<a class="dropdown-item" href="<?= base_url();?>\AnggaranKasApril">April</a>
		<a class="dropdown-item" href="<?= base_url();?>\AnggaranKasMei">Mei</a>
		<a class="dropdown-item" href="#">Juni</a>
		<a class="dropdown-item" href="#">Juli</a>
	</div>
	</div>
</div>


<div style="height:70px"></div>

<div class="container">
	<div class="row" class="container">
		<div class="col-md-6 " class="p-3 mb-5 rounded" id="pieChart" style="height: 300px; box-shadow: 0.5px 0.5px 7px grey;"></div>	
		<div class="col-md-6" style="padding:15px">
			<div class="mb-4 rounded" style="background: #f4d03f; padding:10px; box-shadow: 0.5px 0.5px 7px grey;"> Total Anggaran Kas Seluruh SKPD : Rp.<?= number_format(($ang['anggaran']), 0, ',', '.'); ?></div>
			<div class="mb-4 rounded" style="background: #eb984e; padding:10px; box-shadow: 0.5px 0.5px 7px grey;"> Capaian Realisasi Seluruh SKPD : Rp.<?= number_format(($real['realisasi']),0,',','.'); ?> </div>
			<div class="mb-4 rounded" style="height:50px; background: #fad7a0; padding:10px; box-shadow: 0.5px 0.5px 7px grey;"> Persentase Realisasi Belanja : <?php echo number_format(($real['realisasi']/$ang['anggaran']*100), 2, ',', ''); ?>%</div>
			<div class="mb-4 rounded" style="height:50px; background: #4080bf; padding:10px; box-shadow: 0.5px 0.5px 7px grey; color: white;"> Persentase Belum Terealisasi Belanja : <?php echo number_format(100-($real['realisasi']/$ang['anggaran']*100), 2, ',', ''); ?>%</div>
		</div>
	</div>
</div>

<!-- --------------------------------------------------------PIE CHART ------------------------------------------------>
<script>
	Highcharts.chart('pieChart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Realisasi Anggaran Belanja Bulan <?php echo $bulan;?> (%)'
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
        	colors: [
				'#4080bf',
                '#A8A8A8'],
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
            	fontsize: '100pt',
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
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
            y: <?php  echo number_format(($real['realisasi']/$ang['anggaran']*100), 2, '.', ''); ?> 
        }, {
            name: 'Belum Realisasi',
            y: 100-<?php echo number_format(($real['realisasi']/$ang['anggaran']*100), 2, '.', ''); ?>
        }]
    }]
});

</script>

<!----------------------------------------- DIAGRAM BAR ---------------------------------------------->
<div class="container">
	<div id="barChart" class="p-3 mt-5 rounded" style="box-shadow: 0.5px 0.5px 7px grey;">
	</div>
</div>

<script>
	Highcharts.chart('barChart', {
		colors: ['orange'],
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Penyerapan Anggaran Bulan <?php echo $bulan;?> 2022'
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
							<?php foreach ($$bulan as $bln){
						     	$nama = (string) $bln['nm_skpd'];
							   	$prs = (float) number_format(($bln['realisasi']/$bln['anggaran']*100), 2, '.', '');
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




<!-- ------------------------------------------TABLE----------------------------------------------- -->

<div class="container" style="margin-top: 55px">
	<div class="card mt-5">
		<div class="card-body">
			<h4>Realisasi Belanja Seluruh SKPD Berdasarkan Anggaran Kas Bulan <?php echo $bulan; ?></h4>
			<br>
			<table id="tabel" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
	        	<thead style="text-align: center;">
	        		<tr>
	              	<th> No.</th>
		              <th> Nama SKPD</th>
		              <th> Anggaran Kas </th>
		              <th> Realisasi </th>
		              <th> Persentase </th>
		            </tr>
		        </thead>
	          	<tbody>
					<?php
		            	$no=1;
		            	foreach ($$bulan as $bln): ?>
		          		<tr>
			              <td><?php echo $no++;?>.</td>
			              <td><?= $bln['nm_skpd']; ?></td>
			              <td>Rp.<?= number_format(($bln['anggaran']), 0, ',','.'); ?></td>
			              <td>Rp.<?= number_format(($bln['realisasi']), 0, ',','.'); ?></td>
			              <td><?php echo number_format(($bln['realisasi']/$bln['anggaran']*100), 2, ',', ''); ?>%</td>
			         	</tr>
			        <?php endforeach; ?>
	      		</tbody>
	  		</table>
		</div>
	</div> 
</div>
