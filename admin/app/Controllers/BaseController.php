<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['date', 'url', 'form'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		// Initialize database models
		// -------------------------------------------------------------
		$this->userAccountModel = model('App\Models\AdministratorsModel');

		$this->lyceansModel = model('App\Models\LyceansModel');
		$this->lyceansAccountModel = model('App\Models\LyceansAccountModel');
		$this->lyceansNotificationModel = model('App\Models\LyceansNotificationModel');
		$this->healthRecordsModel = model('App\Models\HealthRecordsModel');

		$this->healthPersonnelsModel = model('App\Models\HealthPersonnelsModel');
		$this->healthPersonnelsAccountModel = model('App\Models\HealthPersonnelsAccountModel');
		$this->healthPersonnelsNotificationModel = model('App\Models\HealthPersonnelsNotificationModel');

		$this->consultationsModel = model('App\Models\ConsultationsModel');
		$this->medicalFilesModel = model('App\Models\MedicalFilesModel');

		$this->activityLogsModel = model('App\Models\ActivityLogsModel');



		// Initialize Directories
		// -------------------------------------------------------------
		
		// Medical Records Directory
		$this->medicalRecordsDir = $_SERVER['DOCUMENT_ROOT'] . '/myLPU-HIMS/clinic/public/uploaded/medical_records/';
		// Medical Files Directory
		$this->medicalFilesDir = $_SERVER['DOCUMENT_ROOT'] . '/myLPU-HIMS/clinic/public/uploaded/medical_files/';
	}
}
