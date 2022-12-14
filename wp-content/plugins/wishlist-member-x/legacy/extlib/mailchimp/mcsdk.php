<?php

class MCSDK {

	private $api_key;
	private $api_url = 'https://%s.api.mailchimp.com/3.0';

	private $request_successful   = false;
	private $last_error           = '';
	private $last_response        = array();
	private $last_response_header = array();

	public $verify_ssl = false;

	public function __construct( $api_key ) {

		$this->api_key              = $api_key;
		$this->last_response        = null;
		$this->last_response_header = null;

		if ( !function_exists( 'curl_init' ) || !function_exists( 'curl_setopt' ) ) {
			trigger_error('cURL not supported.');
			$this->last_error = 'cURL not supported.';
		} else {
			if ( false === strpos( $this->api_key, '-' ) ) {
				trigger_error('Invalid API Key: ' . esc_html( $this->api_key ) );
				$this->last_error = "Invalid API Key: {$this->api_key}";
				$this->api_key    = null;
			} else {
				list( $x, $data_center) = explode( '-', $this->api_key );
				$this->api_url          =  sprintf( $this->api_url, $data_center );
				$this->last_error       = '';
			}
		}
	}

	private function make_request_todo( $action, $method, $args = array(), $timeout = 10 ) {

		$this->last_error           = '';
		$this->request_successful   = false;
		$this->last_response        = null;
		$this->last_response_header = null;

		$request_url = $this->api_url . '/' . $method;
		$status_code = 418;

		$wp_args = array(
			'method' => strtoupper($action),
			'timeout' => $timeout,
			'user-agent' => 'WLM/MCIntegration-API/3.0 (wishlist-member)',
			'headers' => array(
					'Accept' => 'application/vnd.api+json',
					'Content-Type' => 'application/vnd.api+json',
					'Authorization' => 'apikey ' . $this->api_key
				),
			'sslverify'=> $this->verify_ssl,
			'body' => json_encode( $args, JSON_FORCE_OBJECT ),
		);

		$this->last_response = wp_remote_request( $request_url, $wp_args );

		if ( !is_wp_error( $this->last_response ) ) {
			$this->last_response_header = $this->last_response['headers'];
			$status_code                = $this->last_response['response']['code'];

			if ( $status_code >= 200 && $status_code <= 299 ) {
				$this->request_successful = true;
				$this->last_response      = json_decode( $this->last_response['body'], true);
			} else {
				$this->last_error    = sprintf('%d: %s', $this->last_response['response']['code'], $this->last_response['response']['message'] );
				$this->last_response = false;
			}

		} else {
			$this->last_error    = 'An unknown error occured during the request.';
			$this->last_response = false;
		}

		return $this->last_response;
	}

	private function make_request( $action, $method, $args = array(), $timeout = 10 ) {

		$this->last_error           = '';
		$this->request_successful   = false;
		$this->last_response        = null;
		$this->last_response_header = null;

		$request_url = $this->api_url . '/' . $method;
		$status_code = 418;

		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $request_url );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
			'Accept: application/vnd.api+json',
			'Content-Type: application/vnd.api+json',
			'Authorization: apikey ' . $this->api_key
		));
		curl_setopt( $ch, CURLOPT_USERAGENT, 'WLM/MCIntegration-API/3.0 (wishlist-member)');
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, $this->verify_ssl );
		curl_setopt( $ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0 );
		curl_setopt( $ch, CURLOPT_ENCODING, '' );
		curl_setopt( $ch, CURLINFO_HEADER_OUT, true );

		switch ( $action ) {
			case 'post':
				curl_setopt( $ch, CURLOPT_POST, true );
				curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $args, JSON_FORCE_OBJECT ) );
				break;

			case 'get':
				$query = http_build_query( $args, '', '&' );
				curl_setopt( $ch, CURLOPT_URL, $request_url . '?' . $query );
				break;

			case 'delete':
				curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'DELETE' );
				break;

			case 'patch':
				curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'PATCH' );
				curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $args, JSON_FORCE_OBJECT ) );
				break;

			case 'put':
				curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'PUT' );
				curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $args, JSON_FORCE_OBJECT ) );
				break;
		}

		$this->last_response        = curl_exec( $ch );
		$this->last_response_header = curl_getinfo( $ch );

		if ( $this->last_response ) {
			$this->last_response = json_decode( $this->last_response, true);
		} else {
			$this->last_response = false;
		}

		if ( isset( $this->last_response_header['http_code'] ) ) {
			$status_code = (int) $this->last_response_header['http_code'];
		} elseif ( isset( $this->last_response['status'] ) ) {
			$status_code = (int) $this->last_response['status'];
		}

		if ( $status_code >= 200 && $status_code <= 299 ) {
			$this->request_successful = true;
		} else {
			if ( isset( $this->last_response['detail'] ) ) {
				$this->last_error = sprintf('%d: %s', $this->last_response['status'], $this->last_response['detail'] );
			} else {
				$this->last_error = curl_error( $ch );
				$this->last_error = empty($this->last_error) ? print_r($this->last_response, true) : $this->last_error;
			}
			$this->last_response = false;
		}

		curl_close($ch);

		return $this->last_response;
	}

	public function get_subscriber_id( $email ) {
		return md5( strtolower( $email ) );
	}

	public function is_success() {
		return $this->request_successful;
	}

	public function get_last_error() {
		return $this->last_error ? $this->last_error : false;
	}

	public function get_last_response() {
		return $this->last_response;
	}

	public function get_last_response_header() {
		return $this->last_response;
	}

	public function delete( $method, $args = array(), $timeout = 10 ) {
		return $this->make_request( 'delete', $method, $args, $timeout );
	}

	public function get( $method, $args = array(), $timeout = 10 ) {
		return $this->make_request( 'get', $method, $args, $timeout );
	}

	public function patch( $method, $args = array(), $timeout = 10 ) {
		return $this->make_request( 'patch', $method, $args, $timeout );
	}

	public function post( $method, $args = array(), $timeout = 10 ) {
		return $this->make_request( 'post', $method, $args, $timeout );
	}

	public function put( $method, $args = array(), $timeout = 10 ) {
		return $this->make_request( 'put', $method, $args, $timeout );
	}
}
