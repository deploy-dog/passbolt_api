<?php
/**
 * Main application configuration file
 *
 * @copyright (c) 2015 Bolt Softwares Pvt Ltd
 * @licence GNU Affero General Public License http://www.gnu.org/licenses/agpl-3.0.en.html
 */
$config = [
	// General App Details
	'App' => [
		// Should the app be SSL / HTTPS only
		// false will render your installation insecure
		'ssl' => [
			'force' => {{ passbolt_force_ssl::"true" }},
		],
		// Is public registration allowed
		'registration' => [
			'public' => {{ passbolt_allow_public_registration::"false" }},
		],
		// Activate specific entry points for selenium testing.
		// true will render your installation insecure
		'selenium' => [
			'active' => {{ passbolt_selenium::"false" }},
		],
		// Do you want search engine robots to index your site
		// Default is set to false
		'meta' => [
			'robots' => [
				'index' => {{ passbolt_robots_index::"false" }},
			]
		],
	],
	// Analytics configuration
	'Analytics' => [
		'piwik' => [
			// Provide an url to activate tracking.
			// 'url' => ''
		],
	],
	// GPG Configuration
	'GPG' => [
		// Tell GPG where to find the keyring
		// Needs to be available by the user the webserver is running as
		'env' => [
			// You can set this to true if you want to customize the location of the keyring.
			// If false, it will use by default the keyring of the webserver user ~/.gnupg.
			'setenv' => {{ passbolt_setenv::"true" }},
			// otherwise you can set the location here
			// typically on Centos it would be in '/usr/share/httpd/.gnupg'
			'home' => '{{ passbolt_env_home::"/home/www-data/.gnupg" }}',
		],
		// Main server key
		'serverKey' => [
			// Server private key location and fingerprint
			'fingerprint' => '{{ passbolt_serverkey_fingerprint::"2FC8945833C51946E937F9FED47B0811573EE67E" }}',
			'public' => {{ passbolt_serverkey_public::"APP . 'Config' . DS . 'gpg' . DS . 'unsecure.key'" }},
			'private' => {{ passbolt_serverkey_private::"APP . 'Config' . DS . 'gpg' . DS . 'unsecure_private.key'" }},

			// PHP Gnupg module currently does not support passphrase, please leave blank
			'passphrase' => ''
		]
	]
];
