<?php

namespace Config;

use App\Filters\LoggedIn;
use App\Filters\NotLoggedIn;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'loggedin'      => LoggedIn::class,
		'notloggedin'   => NotLoggedIn::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            'csrf' => [
				'except' => ['records/uploadStudentRecord']
			],
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
		'loggedin' => [
			'before' => ['dashboard', 'profile', 'records/*', 'consultations', 'inventory/*', 'changepassword'],
			'after' => ['dashboard', 'profile', 'records/*', 'consultations', 'inventory/*']
		],
		'notloggedin' => [
			'before' => ['/', 'login', 'forgotpassword'],
			'after' => ['/', 'login', 'forgotpassword']
		]
	];
}
