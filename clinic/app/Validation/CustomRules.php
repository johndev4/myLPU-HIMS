<?php

namespace App\Validation;

class CustomRules
{
	public function __construct()
	{
	}

	// Valid password
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

	// Unique schedule datetime
	public function is_unique_datetime(): bool
	{
		$consultationsModel = model('App\Models\ConsultationsModel');
		$consultations = $consultationsModel
			->where('status', 'active')
			->where('personnel_id_no', getIdNo())
			->findAll();

		$datetime = $_GET['meeting_date'] . " " . $_GET['meeting_time'];

		foreach ($consultations as $consultation) {
			if (date_create($consultation['meeting_schedule'])->format('Y-m-d H:i') == $datetime) {
				return false;
			}
		}

		return true;
	}

	// Future schedule datetime
	public function is_future_datetime(): bool
	{
		$datetime = $_GET['meeting_date'] . " " . $_GET['meeting_time'];

		if (date_create($datetime)->format('Y-m-d H:i') <= date('Y-m-d H:i')) {
			return false;
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
