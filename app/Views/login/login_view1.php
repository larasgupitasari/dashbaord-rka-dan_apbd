<!DOCTYPE html>
<html>

    <head>
        <title>Login - Report RAK</title>

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
            
            h1,h2,h3,h4,h5{
                font-weight: bold;
            }
        </style>
    </head>

    <body style="background-color:   #fad7a0;">
            <div class="row" style="padding-top: 15%; ">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="panel" style="background-color: #873600;">
                            <div class="panel-body">
                                <center>
                                    <h1 class="form-title font-awesome" style="color: #fff;">Report RAK</h1>
                                
                                <?php echo isset($message) ? $message : ''; ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-8 col-sm-offset-2">
                                            <form action="<?php echo base_url(); ?>/do_login" method="post" accept-charset="UTF-8" role="form">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" style="text-align:center; border-radius: 5px;" placeholder="username" name="username" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="password" style="text-align:center; border-radius: 5px;" placeholder="password" name="password" required="">                                       
                                                    </div>
                                                    <center>
                                                        <input class="btn btn-default block" style="background-color: #fff; color: red; padding-left: 40px; padding-right: 40px; font-weight: bold; " type="submit" value="LOGIN">
                                                    </center>
                                                </fieldset>
                                            </form>                                            
                                        </div>
                                    </div>
                                    </center>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p style="color: #fff; text-align: center;">Silahkan login dengan username & password anda</p>
                                    </div>
                                </div>
                            </div>
                        </div>                 
                    </div>
            </div>
    </body>
</html>

