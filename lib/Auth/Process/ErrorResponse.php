<?php

/**
 * Authproc filter for generating error responss
 *
 * @author Martin van Es
 * @package SimpleSAMLphp
 *
 * You just follow the 'source' => 'destination' schema. In this example user's  * cn will be the user's displayName.
 *
 *    5 => array(
 *        'class' => 'error:ErrorResponse',
 *        'error' => 'Error an error has occured',
 *         ),
 *
 */

class sspmod_error_Auth_Process_ErrorResponse extends SimpleSAML_Auth_ProcessingFilter {

	/**
	 * Error defaults.
	 */
        private $status = SAML2\Constants::STATUS_RESPONDER;
	private $code = "Error";
        private $message = "Error an error has occured";

	/**
	 * Initialize this filter, parse configuration
	 *
	 * @param array $config  Configuration information about this filter.
	 * @param mixed $reserved  For future use.
	 */
	public function __construct($config, $reserved) {
		parent::__construct($config, $reserved);

		assert('is_array($config)');
		if (isset($config['status'])) {
			$this->status = $config['status'];
		}
		if (isset($config['code'])) {
			$this->code = $config['code'];
		}
		if (isset($config['message'])) {
			$this->message = $config['message'];
		}

	}


	/**
	 * Throw error and generate response.
	 *
	 * @param array &$request  The current request
	 */
	public function process(&$request) {
		SimpleSAML\Logger::info('ErrorResponse');

        	throw new \sspmod_saml_Error(
					$this->status,
					$this->code,
					$this->message
		);

	}
}

