<?php 

namespace App\Models;
use CodeIgniter\Model;

class Mar_model extends Model{

	public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

	public function getMaret()
	{

 		$sql = "SELECT t_rak_belanja.nm_skpd, SUM(t_rak_belanja.bulan3) AS anggaran, SUM(t_realisasi_rekening_belanja.nilai_realisasi) AS realisasi 
 		FROM t_rak_belanja
 		LEFT JOIN t_realisasi_rekening_belanja ON t_rak_belanja.kd_skpd=t_realisasi_rekening_belanja.kd_skpd 
 		AND t_rak_belanja.kd_sub_kegiatan=t_realisasi_rekening_belanja.kd_sub_kegiatan
 		AND t_rak_belanja.kd_rekening=t_realisasi_rekening_belanja.kd_rekening
 		WHERE t_realisasi_rekening_belanja.bulan_dok = 'Mar'
 		GROUP BY t_rak_belanja.nm_skpd,t_rak_belanja.kd_skpd
 		ORDER BY t_rak_belanja.kd_skpd";
 		$hasil = $this->db->query($sql);
 		return $hasil->getResultArray();
	}

	public function pie_anggaran()
	{
		$sql = "SELECT SUM(bulan3) AS anggaran FROM t_rak_belanja";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	public function pie_realisasi()
	{
		$sql = "SELECT SUM(nilai_realisasi) AS realisasi FROM t_realisasi_rekening_belanja WHERE bulan_dok = 'Mar'";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

}


 ?>