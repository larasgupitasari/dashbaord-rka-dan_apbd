<?php 

namespace App\Models;
use CodeIgniter\Model;

class Home_model extends Model{

	public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

	public function getJanuari()
	{

 		$sql = "SELECT r.nm_skpd, SUM(r.bulan1) AS anggaran, SUM(a.nilai_realisasi) AS realisasi 
 		FROM t_rak_belanja r
 		LEFT JOIN t_realisasi_rekening_belanja a ON r.kd_skpd=a.kd_skpd 
 		AND r.kd_sub_kegiatan=a.kd_sub_kegiatan
 		AND r.kd_rekening=a.kd_rekening
 		WHERE a.bulan_dok = 'Jan' AND a.kd_rekening LIKE '5%'
 		GROUP BY r.nm_skpd,r.kd_skpd
 		ORDER BY r.kd_skpd";
 		$hasil = $this->db->query($sql);
 		return $hasil->getResultArray(); 	
	}

	public function pie_Januari()
	{
		$sql = "SELECT SUM(bulan1) AS anggaran FROM t_rak_belanja";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	public function pie_RJanuari()
	{
		$sql = "SELECT SUM(nilai_realisasi) AS realisasi FROM t_realisasi_rekening_belanja WHERE bulan_dok = 'Jan'";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	// -----------------------------------------------------------------------------

	public function getFebruari()
	{

 		$sql = "SELECT r.nm_skpd, SUM(r.bulan2) AS anggaran, SUM(a.nilai_realisasi) AS realisasi 
 		FROM t_rak_belanja r
 		LEFT JOIN t_realisasi_rekening_belanja a ON r.kd_skpd=a.kd_skpd 
 		AND r.kd_sub_kegiatan=a.kd_sub_kegiatan
 		AND r.kd_rekening=a.kd_rekening
 		WHERE a.bulan_dok = 'Feb' AND a.kd_rekening LIKE '5%'
 		GROUP BY r.nm_skpd,r.kd_skpd
 		ORDER BY r.kd_skpd";
 		$hasil = $this->db->query($sql);
 		return $hasil->getResultArray(); 	
	}

	public function pie_Februari()
	{
		$sql = "SELECT SUM(bulan2) AS anggaran FROM t_rak_belanja";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	public function pie_RFebruari()
	{
		$sql = "SELECT SUM(nilai_realisasi) AS realisasi FROM t_realisasi_rekening_belanja WHERE bulan_dok = 'Feb'";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	// -----------------------------------------------------------------

	public function getMaret()
	{

 		$sql = "SELECT r.nm_skpd, SUM(r.bulan3) AS anggaran, SUM(a.nilai_realisasi) AS realisasi 
 		FROM t_rak_belanja r
 		LEFT JOIN t_realisasi_rekening_belanja a ON r.kd_skpd=a.kd_skpd 
 		AND r.kd_sub_kegiatan=a.kd_sub_kegiatan
 		AND r.kd_rekening=a.kd_rekening
 		WHERE a.bulan_dok = 'Mar' AND a.kd_rekening LIKE '5%'
 		GROUP BY r.nm_skpd,r.kd_skpd
 		ORDER BY r.kd_skpd";
 		$hasil = $this->db->query($sql);
 		return $hasil->getResultArray();
	}

	public function pie_Maret()
	{
		$sql = "SELECT SUM(bulan3) AS anggaran FROM t_rak_belanja";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	public function pie_RMaret()
	{
		$sql = "SELECT SUM(nilai_realisasi) AS realisasi FROM t_realisasi_rekening_belanja WHERE bulan_dok = 'Mar'";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	// ----------------------------------------------------------------

	public function getApril()
	{

 		$sql = "SELECT r.nm_skpd, SUM(r.bulan4) AS anggaran, SUM(a.nilai_realisasi) AS realisasi 
 		FROM t_rak_belanja r
 		LEFT JOIN t_realisasi_rekening_belanja a ON r.kd_skpd=a.kd_skpd 
 		AND r.kd_sub_kegiatan=a.kd_sub_kegiatan
 		AND r.kd_rekening=a.kd_rekening
 		WHERE a.bulan_dok = 'Apr' AND a.kd_rekening LIKE '5%'
 		GROUP BY r.nm_skpd,r.kd_skpd
 		ORDER BY r.kd_skpd";
 		$hasil = $this->db->query($sql);
 		return $hasil->getResultArray(); 	
	}

	public function pie_April()
	{
		$sql = "SELECT SUM(bulan4) AS anggaran FROM t_rak_belanja";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	public function pie_RApril()
	{
		$sql = "SELECT SUM(nilai_realisasi) AS realisasi FROM t_realisasi_rekening_belanja WHERE bulan_dok = 'Apr'";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	// -----------------------------------------------------------------------------

	public function getMei()
	{

 		$sql = "SELECT r.nm_skpd, SUM(r.bulan5) AS anggaran, SUM(a.nilai_realisasi) AS realisasi 
 		FROM t_rak_belanja r
 		LEFT JOIN t_realisasi_rekening_belanja a ON r.kd_skpd=a.kd_skpd 
 		AND r.kd_sub_kegiatan=a.kd_sub_kegiatan
 		AND r.kd_rekening=a.kd_rekening
 		WHERE a.bulan_dok = 'May' AND a.kd_rekening LIKE '5%'
 		GROUP BY r.nm_skpd,r.kd_skpd
 		ORDER BY r.kd_skpd";
 		$hasil = $this->db->query($sql);
 		return $hasil->getResultArray();	
	}

	public function pie_Mei()
	{
		$sql = "SELECT SUM(bulan5) AS anggaran FROM t_rak_belanja";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}

	public function pie_RMei()
	{
		$sql = "SELECT SUM(nilai_realisasi) AS realisasi FROM t_realisasi_rekening_belanja WHERE bulan_dok = 'May'";
		$hasil = $this->db->query($sql);
		return $hasil->getResultArray(); 	
	}


}


 ?>