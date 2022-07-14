<?php 

namespace App\Models;
use CodeIgniter\Model;

class Login_model extends Model{

	public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

	public function getDataUserPass($username,$pass)
	{
        $sql = "SELECT MU.*, mu2.description , muu.id_reference_unit FROM M_USER MU
            left join mm_user_unit muu on MU.user_id = muu .user_id and muu .deleted_at is null 
            left join m_unit mu2 on muu.id_reference_unit = mu2.id_reference_unit and mu2.id_reference_level_unit = '10' WHERE MU.USERNAME = '".$username."' AND MU.PASSWORD = '".$pass."' AND MU.DELETED_AT IS NULL ";

		$hasil = $this->db->query($sql);
		return $hasil->getResult(); 
    }

}

?>