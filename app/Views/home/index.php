<?php foreach ($Anggaran as $ang): ?>
<?php endforeach; ?>

<?php foreach ($Realisasi as $real): ?>
<?php endforeach; ?>

<div style="height:70px"></div>

<div class="container">
	<div class="row" class="container">
		<div class="col-md-6 " class="p-3 mb-5 rounded" id="pieChart" style="height: 300px; box-shadow: 0.5px 0.5px 7px grey;"></div>	
		<div class="col-md-6">
			<div class="p-2 mb-4 rounded" style="height: 50px; background: #f4d03f  ; margin-top: 25px; box-shadow: 0.5px 0.5px 7px grey;"> Total Anggaran Kas Seluruh SKPD : Rp.<?= number_format(($ang['anggaran']), 0, ',', '.'); ?></div>

			<div class="p-2 mb-4 rounded" style="height: 50px; background:  #eb984e   ; margin-bottom: 25px; box-shadow: 0.5px 0.5px 7px grey;"> Capaian Realisasi Seluruh SKPD : Rp.<?= number_format(($real['realisasi']),0,',','.'); ?> </div>
			<div class="p-2 mb-4 rounded" style="height: 50px; background:   #fad7a0   ; box-shadow: 0.5px 0.5px 7px grey;"> Persentase Realisasi Belanja : <?php echo number_format(($real['realisasi']/$ang['anggaran']*100), 2, ',', ''); ?>%</div>
			<div class="p-2 mb-4 rounded" style="height: 50px; background:   #873600   ; box-shadow: 0.5px 0.5px 7px grey; color: white;"> Persentase Belum Terealisasi Belanja : <?php echo number_format(100-($real['realisasi']/$ang['anggaran']*100), 2, ',', ''); ?>%</div>
		</div>
	</div>
</div>

<!-- PIE CHART -->
<script>
	Highcharts.chart('pieChart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Realisasi Anggaran Belanja Bulan Januari (%)'
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
			     '#fad7a0', 
			     '#873600'],
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
	        text: 'Penyerapan Anggaran Bulan Januari 2022'
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
							<?php foreach ($Januari as $jan){
						     	$nama = (string) $jan['nm_skpd'];
							   	$prs = (float) number_format(($jan['realisasi']/$jan['anggaran']*100), 2, '.', '');
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
			<h4>Realisasi Belanja Seluruh SKPD Berdasarkan Anggaran Kas Bulan Januari</h4>
			<br>
			<table id="tabel" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
		            	foreach ($Januari as $jan): ?>
		          		<tr>
			              <td><?php echo $no++;?>.</td>
			              <td><?= $jan['nm_skpd']; ?></td>
			              <td>Rp.<?= number_format(($jan['anggaran']), 0, ',','.'); ?></td>
			              <td>Rp.<?= number_format(($jan['realisasi']), 0, ',','.'); ?></td>
			              <td><?php echo number_format(($jan['realisasi']/$jan['anggaran']*100), 2, ',', ''); ?>%</td>
			         	  </tr>
			         	<?php endforeach; ?>
	      		</tbody>
	  		</table>
		</div>
	</div> 
</div>
