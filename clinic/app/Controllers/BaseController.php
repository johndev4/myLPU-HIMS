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
	protected $helpers = ['date'];

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

		// Initialized database models
		$this->userModel = model('App\Models\HealthPersonnelsModel');
		$this->userAccountModel = model('App\Models\HealthPersonnelsAccountModel');
		$this->notificationModel = model('App\Models\HealthPersonnelsNotificationModel');
		$this->lyceansModel = model('App\Models\LyceansModel');
		$this->lyceansAccountModel = model('App\Models\LyceansAccountModel');
		$this->healthRecordsModel = model('App\Models\HealthRecordsModel');
		$this->consultationsModel = model('App\Models\ConsultationsModel');
		$this->medicalFilesModel = model('App\Models\MedicalFilesModel');
		
	}
}
