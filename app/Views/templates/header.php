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
  background: #4080bf !important;
  border-color: #4080bf;
}
.pagination > li > a,
.pagination > li > span {
    color: #4080bf
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

hr {
  /* margin-top: 1rem;
  margin-bottom: 1rem; */
  border: 0;
  height: 5px;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
}

</style>
</head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light" style="width: 100%; background: #4080bf; color:white;">

        <div class="navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url();?>\DasboardAnggaranKAS" style="color:white">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false" style="color:white">
                Report Realisasi
                </a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url();?>\AnggaranKasJanuari">Realisasi Anggaran Kas</a>
                <a class="dropdown-item" href="<?= base_url();?>\DashboardAPBD">Realisasi APBD</a>
            </li>
          </ul>
        </div>

          
          <div class="col-md-1">

            <li class="nav-item dropdown float-left" style="list-style-type: none;">
              <a data-toggle="dropdown" aria-haspopup="true">
                <span class="bi bi-gear-fill fa-2x"></span>
              </a>
              <div class="dropdown-menu pull-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#gantipw">Ganti Password</a>
                <a class="dropdown-item" href="<?php echo base_url();?>/log_outrak">Logout</a>
              </div>
            </li>
          </div>
      </nav>

      <div class="modal fade" id="gantipw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table">
                  <tr>
                    <td>Password Saat ini</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" required></td>
                  </tr>
                  <tr>
                    <td>Password Baru</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" required></td>
                  </tr>
                  <tr>
                    <td>Konfirmasi Password Baru</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" required></td>
                  </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button class="btn" style="background-color: #4080bf; color: white">Simpan</button>
            </div>
          </div>
        </div>
      </div>


