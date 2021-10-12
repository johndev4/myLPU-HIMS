<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Notifications extends BaseController
{
	public function __construct()
	{
		helper(['useraccount', 'timeinterval']);
	}


	// FETCH ALL NOTIFICATIONS
	// -----------------------------------------------------------------
	public function fetchAllNotifications($id)
	{
		$notifications = $this->lyceansNotificationModel
			->where('id_no', $id)
			->findAll();
		$unreadNotifications = $this->lyceansNotificationModel
			->where('id_no', $id)->where('status', 'unread')
			->findAll();

		$result = "";
		if ($notifications) {
			foreach ($notifications as $notification) {
				// Define notification time interval from current time
				$timeInterval = time_elapsed_string($notification['created_at']);
				// Define notification status
				$status = $notification['status'] == "unread" ? "bold" : "normal";
				// Define notification category icon
				$consultation_no = explode('/', $notification['link'])[8];
				$consultatation = $this->consultationsModel->find($consultation_no);
				if ($consultatation['category'] == 'Consultation') {
					$icon = '<i class="fas fa-comment-medical mr-2"></i>';
				} else if ($notification['category'] == 'Mental Wellness') {
					$icon = '<i class="fas fa-brain"></i>';
				}

				$data = "
				<div class=\"dropdown-divider\"></div>
				<a href=\"" . base_url('notifications/redirectToConsultationDetails/' . $notification['notification_id']) . "\" class=\"dropdown-item\">
					{$icon} <span style=\"font-weight: {$status}\"> {$notification['info']} </span>
					<span class=\"float-right text-muted text-sm\"> $timeInterval </span>
				</a>
				";
				$result .= $data;
			}
		} else {
			$result = "
			<div class=\"dropdown-divider\"></div>
			<div class=\"dropdown-item\" align=\"center\">
				<span> No notifications. </span>
			</div>
			";
		}

		return json_encode(['result' => $result, 'count' => count($notifications), 'unreadCount' => count($unreadNotifications)]);
	}


	// CLEAR ALL NOTIFICATIONS
	// -----------------------------------------------------------------
	public function clearAll()
	{
		$success = $this->lyceansNotificationModel->where('id_no', getIdNo())->delete();

		if ($success) {// SUCCESS
		} else {// ERROR
		}

		return redirect()->to($_SERVER['HTTP_REFERER']);
	}


	// REDIRECT NOTIFICATION TO CONSULTATION DETAILS
	// -----------------------------------------------------------------
	public function redirectToConsultationDetails($id)
	{
		$success = $this->lyceansNotificationModel
			->where('notification_id', $id)
			->set(['status' => 'read'])
			->update();
		$notification = $this->lyceansNotificationModel->find($id);

		if ($success && $notification) {
			return redirect()->to($notification['link']);
		} else {
		}
	}
}
