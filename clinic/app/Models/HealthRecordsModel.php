<?php

namespace App\Models;

use CodeIgniter\Model;

class HealthRecordsModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'health_records';
	protected $primaryKey           = 'record_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_no', 'file_path'];

	// Dates
	protected $useTimestamps        = true;
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


	// public function countAll()
	// {
	// 	$db = \Config\Database::connect();
	// 	$lyceans = $db->table($this->table);
	// 	return $lyceans->countAllResults();
	// }
}
