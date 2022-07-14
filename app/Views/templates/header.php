<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" src="https://code.highcharts.com/css/highcharts.css">

    <link rel="stylesheet" src="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> 
    <link rel="stylesheet" src="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css"> 

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
<style>
  .highcharts-pie-series .highcharts-point {
    stroke-width: 11px;
    stroke-linejoin: round;
    stroke-opacity: .2;
    stroke: black;
}

.page-item.active .page-link {
  color: white; !important;
  background: #873600 !important;
  border-color: #873600;
}
.pagination > li > a,
.pagination > li > span {
    color: #873600
}

.pagination > .active > a,
.pagination > .active > a:focus,
.pagination > .active > a:hover,
.pagination > .active > span,
.pagination > .active > span:focus,
.pagination > .active > span:hover {
    background-color: #873600;
    border-color: #873600;
}
</style>

    <title><?php echo $bulan; ?></title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light rounded" style="width: 100%; background: #873600; color:white;">
        <a class="navbar-brand">Realisasi Belanja SKPD Berdasarkan Anggaran Kas Bulan <?php echo $bulan; ?> Tahun Anggaran 2022</a>
        <div style="float: right; padding-left: 600px;" class="col-md-6">
          <a href="<?php echo base_url(); ?>/log_outrak"><button class="btn btn-warning">Logout</button></a>
        </div>
      </nav>
    
    <div class="container" style="padding-top: 20px;"> 
      <div class="dropdown show" style="float: right; box-shadow: 0.5px 0.5px 7px grey;" class="col-md-6">
        <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pilih Bulan
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="<?= base_url();?>\DasboardAnggaranKAS">Januari</a>
          <a class="dropdown-item" href="<?= base_url();?>\AnggaranKasFebruari">Februari</a>
          <a class="dropdown-item" href="<?= base_url();?>\AnggaranKasMaret">Maret</a>
          <a class="dropdown-item" href="<?= base_url();?>\AnggaranKasApril">April</a>
          <a class="dropdown-item" href="<?= base_url();?>\AnggaranKasMei">Mei</a>
        </div>
      </div>
    </div>


