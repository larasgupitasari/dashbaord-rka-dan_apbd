<?php 

namespace App\Models;
use CodeIgniter\Model;

class ReportAPBD_model extends Model{

	public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

	public function get10DataReal($rek90)
	{

		$sql = "select coalesce(a.anggaran,0) as anggaran , coalesce(a.realisasi,0) as realisasi, 
			a.kd_unit, a.nm_unit, coalesce((a.realisasi/a.anggaran * 100) , 0) as prosentase, a.name1 from
			(select sum(r.anggaran) as anggaran, sum(r.realisasi) as realisasi, r.kd_unit, r.nm_unit, mu.name1 
			from realisasiapbdyearnowv2 r
			left join m_unit mu 
			on r.kd_unit  = mu.id_reference_unit and mu.id_reference_level_unit = '10'
			where r.kd_rek90_1 = '".$rek90."' and mu.id_reference_level_unit = '10'
			group by r.kd_unit , r.nm_unit, mu.name1  ) a
			order by prosentase desc
			limit 10";
 		$hasil = $this->db->query($sql);
 		return $hasil->getResultArray(); 	
	}

	public function getDataReal($rek90,$id_unit,$role_dashboard)
	{
		$whereskpd = "";
		if($role_dashboard == 3){
			$whereskpd = "and r.kd_unit = '".$id_unit."' ";
		}

		$sql = "select coalesce(a.anggaran,0) as anggaran , coalesce(a.realisasi,0)  as realisasi, 
			a.kd_unit, a.nm_unit, coalesce((a.realisasi/a.anggaran * 100) , 0) as prosentase, a.name1 from
			(select sum(r.anggaran) as anggaran, sum(r.realisasi) as realisasi, r.kd_unit, r.nm_unit, mu.name1 
			from realisasiapbdyearnowv2 r
			left join m_unit mu 
			on r.kd_unit  = mu.id_reference_unit and mu.id_reference_level_unit = '10'
			where r.kd_rek90_1 = '".$rek90."' and mu.id_reference_level_unit = '10' $whereskpd
			group by r.kd_unit , r.nm_unit, mu.name1  ) a
			order by prosentase desc";
 		$hasil = $this->db->query($sql);
 		return $hasil->getResultArray(); 	
	}

	public function getDataRealSKPD($rek90,$idunit)
	{

		$sql = "select coalesce(a.anggaran,0) as anggaran , coalesce(a.realisasi,0)  as realisasi, 
			a.kd_unit, a.nm_unit, coalesce((a.realisasi/a.anggaran * 100) , 0) as prosentase, a.kd_sub_unit, a.nm_sub_unit, a.kd_bidang, a.nm_bidang, a.kd_program, a.nm_program, a.kd_kegiatan, a.nm_kegiatan, a.kd_sub_kegiatan, a.nm_sub_kegiatan, a.name1 from
			(select sum(r.anggaran) as anggaran, sum(r.realisasi) as realisasi, r.kd_unit, r.nm_unit, r.kd_sub_unit, r.nm_sub_unit, r.kd_bidang, r.nm_bidang, r.kd_program, r.nm_program, r.kd_kegiatan, r.nm_kegiatan, r.kd_sub_kegiatan, r.nm_sub_kegiatan, mu.name1 
			from realisasiapbdyearnowv2 r
			left join m_unit mu 
			on r.kd_unit  = mu.id_reference_unit and mu.id_reference_level_unit = '10'
			where r.kd_rek90_1 = '".$rek90."' and mu.id_reference_level_unit = '10' and r.kd_unit = '".$idunit."'
			group by r.kd_unit , r.nm_unit, r.kd_sub_unit, r.nm_sub_unit, r.kd_bidang, r.nm_bidang, r.kd_program, r.nm_program, r.kd_kegiatan, r.nm_kegiatan, r.kd_sub_kegiatan, r.nm_sub_kegiatan, mu.name1  ) a
			order by prosentase desc";
 		$hasil = $this->db->query($sql);
 		return $hasil->getResultArray(); 	
	}


	public function SummaryRealisasiPendapatan($id_unit,$role_dashboard)
	{
		$whereskpd = "";
		if($role_dashboard == 3){
			$whereskpd = "and r.kd_unit = '".$id_unit."' ";
		}

		$sql = "select sum(r.realisasi) as realiasipendapatan from realisasiapbdyearnowv2 r where tahun = '2022' and kd_rek90_1 = '4' $whereskpd";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	public function SummaryRealisasiBelanja($id_unit,$role_dashboard)
	{
		$whereskpd = "";
		if($role_dashboard == 3){
			$whereskpd = "and r.kd_unit = '".$id_unit."' ";
		}

		$sql = "select sum(r.realisasi) as realiasibelanja from realisasiapbdyearnowv2 r where tahun = '2022' and kd_rek90_1 = '5' $whereskpd";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	public function SummaryRealisasiPembiayaan($id_unit,$role_dashboard)
	{
		$whereskpd = "";
		if($role_dashboard == 3){
			$whereskpd = "and r.kd_unit = '".$id_unit."' ";
		}
		
		$sql = "select sum(r.realisasi) as realiasipembiayaan from realisasiapbdyearnowv2 r where tahun = '2022' and kd_rek90_1 = '6' $whereskpd";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	public function SummaryAnggaranPendapatan($id_unit,$role_dashboard)
	{
		$whereskpd = "";
		if($role_dashboard == 3){
			$whereskpd = "and r.kd_unit = '".$id_unit."' ";
		}
		
		$sql = "select sum(r.anggaran) as anggaranpendapatan from realisasiapbdyearnowv2 r where tahun = '2022' and kd_rek90_1 = '4' $whereskpd";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	public function SummaryAnggaranBelanja($id_unit,$role_dashboard)
	{
		$whereskpd = "";
		if($role_dashboard == 3){
			$whereskpd = "and r.kd_unit = '".$id_unit."' ";
		}
		
		$sql = "select sum(r.anggaran) as anggaranbelanja from realisasiapbdyearnowv2 r where tahun = '2022' and kd_rek90_1 = '5' $whereskpd";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	public function SummaryAnggaranPembiayaan($id_unit,$role_dashboard)
	{
		$whereskpd = "";
		if($role_dashboard == 3){
			$whereskpd = "and r.kd_unit = '".$id_unit."' ";
		}
		
		$sql = "select sum(r.anggaran) as anggaranpembiayaan from realisasiapbdyearnowv2 r where tahun = '2022' and kd_rek90_1 = '6' $whereskpd";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

}


 ?>