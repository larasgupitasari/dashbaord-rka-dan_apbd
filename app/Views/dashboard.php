<?php foreach ($Anggaran as $ang): ?>
<?php endforeach; ?>

<?php foreach ($Realisasi as $real): ?>
<?php endforeach; ?>

<title> Dashboard Report Realisasi</title>

<div style="height:50px"></div>

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

<br>

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
