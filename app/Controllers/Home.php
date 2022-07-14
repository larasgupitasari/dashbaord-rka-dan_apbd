<?php

namespace App\Controllers;
use App\Models\Home_model;
use App\Models\Feb_model;
use App\Models\Mar_model;
use App\Models\Apr_model;
use App\Models\Mei_model;

class Home extends BaseController
{
    public function __construct()
    {
        $this->Home_model = new Home_model();
        $this->Feb_model = new Feb_model();
        $this->Mar_model = new Mar_model();
        $this->Apr_model = new Apr_model();
        $this->Mei_model = new Mei_model();
    }

    public function DasboardAnggaranKAS()
	{
		$data['bulan'] = 'Januari';
		$data['Januari'] = $this->Home_model->getJanuari();
		$data['Anggaran'] = $this->Home_model->pie_anggaran();
		$data['Realisasi'] = $this->Home_model->pie_realisasi();	
		return view('templates/header', $data)
			. view('home/index', $data)
			. view('templates/footer');
	}

    public function AnggaranKasFebruari()
    {
        $data['bulan'] = 'Februari';

        $data['Februari'] = $this->Feb_model->getFebruari();
        $data['Anggaran'] = $this->Feb_model->pie_anggaran();
        $data['Realisasi'] = $this->Feb_model->pie_realisasi();

        return view('templates/header', $data)
            . view('home/feb', $data)
            . view('templates/footer');
    }

    public function AnggaranKasMaret()
    {
        $data['bulan'] = 'Maret';

        $data['Maret'] = $this->Mar_model->getMaret();
        $data['Anggaran'] = $this->Mar_model->pie_anggaran();
        $data['Realisasi'] = $this->Mar_model->pie_realisasi();

        return view('templates/header', $data)
            . view('home/mar', $data)
            . view('templates/footer');
    }
    public function AnggaranKasApril()
    {
        $data['bulan'] = 'April';

        $data['April'] = $this->Apr_model->getApril();
        $data['Anggaran'] = $this->Apr_model->pie_anggaran();
        $data['Realisasi'] = $this->Apr_model->pie_realisasi();

        return view('templates/header', $data)
            . view('home/apr', $data)
            . view('templates/footer');
    }

    public function AnggaranKasMei()
    {
        $data['bulan'] = 'Mei';

        $data['Mei'] = $this->Mei_model->getMei();
        $data['Anggaran'] = $this->Mei_model->pie_anggaran();
        $data['Realisasi'] = $this->Mei_model->pie_realisasi();

        return view('templates/header', $data)
            . view('home/mei', $data)
            . view('templates/footer');
    }
}
