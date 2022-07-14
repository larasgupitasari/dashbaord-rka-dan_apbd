<?php

namespace App\Controllers;
use CodeIgniter\HTTP\IncomingRequest;
use App\Models\ReportAPBD_model;
use App\Models\Home_model;

class ReportAPBD extends BaseController
{
    public function __construct()
    {
        $this->ReportAPBD_model = new ReportAPBD_model();
        $this->Home_model = new Home_model();

    }

    public function DashboardAPBD($request = "")
	{
        $request = service('request');
        $kdskpd = $request->getPost('skpd');

        $userData = session()->get('userdata');
        $id_unit = $userData['userdata'][0]->id_reference_unit;
        $role_dashboard = $userData['userdata'][0]->role_dashboard_id;

        $data['name'] = $userData['userdata'][0]->description;

		$data['getDataRealPendapatan'] = $this->ReportAPBD_model->getDataReal('4',$id_unit,$role_dashboard);
		$data['get10DataRealPendapatan'] = $this->ReportAPBD_model->get10DataReal('4');

		//print_r($data['get10DataRealPendapatan']);exit();

		$data['getDataRealBelanja'] = $this->ReportAPBD_model->getDataReal('5',$id_unit,$role_dashboard);
		$data['get10DataRealBelanja'] = $this->ReportAPBD_model->get10DataReal('5');

		$data['getDataRealPembiayaan'] = $this->ReportAPBD_model->getDataReal('6',$id_unit,$role_dashboard);
		$data['get10DataRealPembiayaan'] = $this->ReportAPBD_model->get10DataReal('6');

		$data['summaryrealpendapatan'] = $this->ReportAPBD_model->SummaryRealisasiPendapatan($id_unit,$role_dashboard);
		$data['summaryrealbelanja'] = $this->ReportAPBD_model->SummaryRealisasiBelanja($id_unit,$role_dashboard);
		$data['summaryrealpembiayaan'] = $this->ReportAPBD_model->SummaryRealisasiPembiayaan($id_unit,$role_dashboard);
		$data['summaryanggpendapatan'] = $this->ReportAPBD_model->SummaryAnggaranPendapatan($id_unit,$role_dashboard);
		$data['summaryanggbelanja'] = $this->ReportAPBD_model->SummaryAnggaranBelanja($id_unit,$role_dashboard);
		$data['summaryanggpembiayaan'] = $this->ReportAPBD_model->SummaryAnggaranPembiayaan($id_unit,$role_dashboard);

		if($role_dashboard == 3){
			return view('templates/header1', $data)
				. view('reportapbd/DashboardReportAPBDSKPD', $data)
				. view('templates/footer1');
		}
		else{
			return view('templates/header1', $data)
				. view('reportapbd/DashboardReportAPBD', $data)
				. view('templates/footer1');
		}

		
	}

	public function DetailBelanja($Idunit)
	{
		
		//echo $Idunit;exit();-

		$data['getDataDetailBelanja'] = $this->ReportAPBD_model->getDataRealSKPD('5',$Idunit);

		return view('templates/header1', $data)
			. view('reportapbd/DashboardReportBelanjaSKPD', $data)
			. view('templates/footer1');
	}

}
