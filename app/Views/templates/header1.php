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
  background: #3A5BA0 !important;
  border-color: #3A5BA0;
}
.pagination > li > a,
.pagination > li > span {
    color: #3A5BA0
}

.pagination > .active > a,
.pagination > .active > a:focus,
.pagination > .active > a:hover,
.pagination > .active > span,
.pagination > .active > span:focus,
.pagination > .active > span:hover {
    background-color: #3A5BA0;
    border-color: #3A5BA0;
}
</style>

    <title>Report - Realisasi APBD</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light rounded" style="width: 100%; background: #3A5BA0; color:white;">
        <a class="navbar-brand">Report Realisasi APBD Kabupaten Tuban Tahun Anggaran 2022</a>
         <div style="float: right; padding-left: 600px;" class="col-md-6">
          <a href="<?php echo base_url(); ?>/log_outapbd"><button class="btn btn-warning">Logout</button></a>
        </div>
      </nav>
    


