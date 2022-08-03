<?php

namespace App\Controllers;
use App\Models\Home_model;
use App\Models\ReportAPBD_model;

class ReportRAK extends BaseController
{
    public function __construct()
    {
        $this->Home_model = new Home_model();
        $this->ReportAPBD_model = new ReportAPBD_model();
    }
    
    public function DasboardAnggaranKAS()
	{
        $data['bulan'] = 'Mei';

        $data['Mei'] = $this->Home_model->getMei();
        $data['Anggaran'] = $this->Home_model->pie_Mei();
        $data['Realisasi'] = $this->Home_model->pie_RMei();

        $id_unit = $userData['userdata'][0]->id_reference_unit;
        $role_dashboard = $userData['userdata'][0]->role_dashboard_id;

        $data['summaryrealbelanja'] = $this->ReportAPBD_model->SummaryRealisasiBelanja($id_unit,$role_dashboard);
        $data['summaryanggbelanja'] = $this->ReportAPBD_model->SummaryAnggaranBelanja($id_unit,$role_dashboard);

		return view('templates/header', $data)
			. view('dashboard', $data)
			. view('templates/footer');
	}

    public function AnggaranKasJanuari()
	{
		$data['bulan'] = 'Januari';

		$data['Januari'] = $this->Home_model->getJanuari();
		$data['Anggaran'] = $this->Home_model->pie_Januari();
		$data['Realisasi'] = $this->Home_model->pie_RJanuari();	
		return view('templates/header', $data)
			. view('home/index', $data)
			. view('templates/footer');
	}

    public function AnggaranKasFebruari()
    {
        $data['bulan'] = 'Februari';

        $data['Februari'] = $this->Home_model->getFebruari();
        $data['Anggaran'] = $this->Home_model->pie_Februari();
        $data['Realisasi'] = $this->Home_model->pie_RFebruari();

        return view('templates/header', $data)
            . view('home/index', $data)
            . view('templates/footer');
    }

    public function AnggaranKasMaret()
    {
        $data['bulan'] = 'Maret';

        $data['Maret'] = $this->Home_model->getMaret();
        $data['Anggaran'] = $this->Home_model->pie_Maret();
        $data['Realisasi'] = $this->Home_model->pie_RMaret();

        return view('templates/header', $data)
            . view('home/index', $data)
            . view('templates/footer');
    }
    public function AnggaranKasApril()
    {
        $data['bulan'] = 'April';

        $data['April'] = $this->Home_model->getApril();
        $data['Anggaran'] = $this->Home_model->pie_April();
        $data['Realisasi'] = $this->Home_model->pie_RApril();

        return view('templates/header', $data)
            . view('home/index', $data)
            . view('templates/footer');
    }

    public function AnggaranKasMei()
    {
        $data['bulan'] = 'Mei';

        $data['Mei'] = $this->Home_model->getMei();
        $data['Anggaran'] = $this->Home_model->pie_Mei();
        $data['Realisasi'] = $this->Home_model->pie_RMei();

        return view('templates/header', $data)
            . view('home/index', $data)
            . view('templates/footer');
    }

    // public function AnggaranKasJuni()
    // {
    //     $data['bulan'] = 'Juni';

    //     $data['Mei'] = $this->Juni_model->getJuni();
    //     $data['Anggaran'] = $this->Juni_model->pie_anggaran();
    //     $data['Realisasi'] = $this->Juni_model->pie_realisasi();

    //     return view('templates/header', $data)
    //         . view('home/index', $data)
    //         . view('templates/footer');
    // }
}
