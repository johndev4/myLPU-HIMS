<?php

namespace App\Models;

use CodeIgniter\Model;

class HealthPersonnelsAccountModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'health_personnels_account';
	protected $primaryKey           = 'id_no';
	protected $useAutoIncrement     = false;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_no', 'username', 'password', 'locked'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];


	public function countAll()
	{
		$db = \Config\Database::connect();
		$healthPersonnelsAccount = $db->table($this->table);
		return $healthPersonnelsAccount->countAllResults();
	}
}
