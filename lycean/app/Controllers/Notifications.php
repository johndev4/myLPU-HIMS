<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Notifications extends BaseController
{
	public function __construct()
	{
		helper('timeinterval');
	}


	// FETCH ALL NOTIFICATIONS
	// -----------------------------------------------------------------
	public function fetchAllNotifications($id)
	{
		$notifications = $this->lyceansNotificationModel
			->where('id_no', $id)
			->findAll();

		$result = "";
		foreach ($notifications as $notification) {
			$timeInterval = time_elapsed_string($notification['created_at']);
			$status = $notification['status'] == "read"? "strong" : "normal";

			$data = "
			<div class=\"dropdown-divider\"></div>
			<a href=\"{$notification['link']}\" class=\"dropdown-item\">
				<i class=\"fas fa-comment-medical mr-2\"></i><span style=\"font-weight: {$status}\"> {$notification['info']} </span>
				<span class=\"float-right text-muted text-sm\"> $timeInterval </span>
			</a>
			";
			$result .= $data;
		}

		// return json_encode(['result' => $result, 'count' => count($consultations)]);
		echo $result;
	}


	// CLEAR ALL NOTIFICATIONS
	// -----------------------------------------------------------------
	public function clearAll()
	{
	}
}
