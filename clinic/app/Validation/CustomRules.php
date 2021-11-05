<?php

namespace App\Validation;

class CustomRules
{
	public function __construct()
	{
		helper('useraccount');
	}

	public function valid_password($str): bool
	{
		$password = trim($str);

		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';


		if (preg_match_all($regex_lowercase, $password) < 1) {
			return false;
		}

		if (preg_match_all($regex_uppercase, $password) < 1) {
			return false;
		}

		if (preg_match_all($regex_number, $password) < 1) {
			return false;
		}

		if (preg_match_all($regex_special, $password) < 1) {
			return false;
		}

		if (strlen($password) < 8) {
			return false;
		}

		return true;
	}

	// For consultation schedule
	public function is_unique_time($time): bool
	{
		$consultationsModel = model('App\Models\ConsultationsModel');
		$consultations = $consultationsModel
			->where('personnel_id_no', getIdNo())
			->findAll();

		foreach ($consultations as $consultation) {
			if (date_create($consultation['meeting_schedule'])->format('H:i') == $time) {
				return false;
			}
		}

		return true;
	}

	// Date greater than other date
	public function date_greater_than($date1, $date2): bool
	{
		if (date_create($date1) > date_create($date2)) {
			return false;
		}

		return true;
	}

	// Date less than other date
	public function date_less_than($date1, $date2): bool
	{
		if (date_create($date1) < date_create($date2)) {
			return false;
		}

		return true;
	}
}
