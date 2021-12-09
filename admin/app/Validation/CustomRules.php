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

	// Valid ID No.
	public function valid_idno($str): bool
	{
		for ($i = 0; $i < strlen($str); $i += 1) {
			if (!is_numeric($str[$i]) && $str[$i] != "-") {
				return false;
			}
		}
		return true;
	}
}
