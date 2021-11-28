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
		$notifications = $this->notificationModel
			->where('id_no', $id)
			->orderBy('created_at', 'desc')->findAll();
		$unreadNotifications = $this->notificationModel
			->where('id_no', $id)->where('status', 'unread')
			->findAll();

		$newNotification = $this->notificationModel
			->where('id_no', $id)
			->orderBy('created_at', 'desc')->first();

		$result = "";
		if ($notifications) {
			foreach ($notifications as $notification) {
				// Define notification time interval from current time
				$timeInterval = time_elapsed_string($notification['created_at']);
				// Define notification status
				$status1 = $notification['status'] == "unread" ? "bold" : "normal";
				$status2 = $notification['status'] == "unread" ? "text-primary" : "text-secondary";

				$data = "
				<a href=\"" . site_url('notifications/redirectToConsultationDetails/' . $notification['notification_id']) . "\" class=\"dropdown-item\">
					<div class=\"notifications-item\">{$notification['icon']}
						<div class=\"text\" style=\"width: 100%;\">
							<p style=\"font-weight: {$status1}; color: #444444\"> {$notification['info']} </p>
							<p class=\"text-right {$status2}\"> $timeInterval </p>
						</div>
					</div>
				</a>
				";
				$result .= $data;
			}
		} else {
			$result = "
			<p class=\"text-center\" style=\"margin: 190px auto; color: #444444\"> No notifications. </p>
			";
		}

		return json_encode([
			'result' => $result,
			'count' => count($notifications),
			'unreadCount' => count($unreadNotifications),
			'notificationInfo' => !empty($newNotification['info']) ? $newNotification['info'] : 'false'
		]);
	}


	// CLEAR ALL NOTIFICATIONS
	// -----------------------------------------------------------------
	public function clearAll()
	{
		$success = $this->notificationModel->where('id_no', getIdNo())->delete();

		if ($success) { // SUCCESS
		} else { // ERROR
		}

		return redirect()->to($_SERVER['HTTP_REFERER']);
	}


	// REDIRECT NOTIFICATION TO CONSULTATION DETAILS
	// -----------------------------------------------------------------
	public function redirectToConsultationDetails($id)
	{
		$success = $this->notificationModel
			->where('notification_id', $id)
			->set(['status' => 'read'])
			->update();
		$notification = $this->notificationModel->find($id);

		if ($success && $notification) {
			return redirect()->to($notification['link']);
		} else {
		}
	}


	// SET SCHEDULE CONSULTATION
	// -----------------------------------------------------------------
	// public function setScheduleNotification()
	// {
	// 	$activeConsultation = $this->consultationsModel
	// 		->where('lycean_id_no', getIdNo())
	// 		->where('status', 'active')
	// 		->first();

	// 	if ($activeConsultation) {
	// 		$reminderNotification = $this->notificationModel
	// 			->where('id_no', getIdNo())
	// 			->where('info', "Reminder: Consultation at " . date_create($activeConsultation['meeting_schedule'])->format('F d, Y h:i A'))
	// 			->first();

	// 		if ($reminderNotification == []) {
	// 			if (date_create($activeConsultation['meeting_schedule'])->format('Y-m-d H:i') == date('Y-m-d H:i')) {
	// 				if ($activeConsultation['category'] == 'Consultation') {
	// 					$icon = '<i class="fas fa-comment-medical fa-lg noti-icon" style="color: #7687CD"></i>';
	// 				} else if ($activeConsultation['category'] == 'Mental Wellness') {
	// 					$icon = '<i class="fas fa-brain fa-lg noti-icon" style="color: #CC6699"></i>';
	// 				}

	// 				$this->notificationModel->save([
	// 					'id_no' => getIdNo(),
	// 					'icon' => $icon,
	// 					'info' => "Reminder: Consultation at " . date_create($activeConsultation['meeting_schedule'])->format('F d, Y h:i A'),
	// 					'status' => 'unread',
	// 					'link' => site_url('consultation/details/' . $activeConsultation['consultation_no'])
	// 				]);
	// 			}
	// 		}
	// 	}
	// }
}
