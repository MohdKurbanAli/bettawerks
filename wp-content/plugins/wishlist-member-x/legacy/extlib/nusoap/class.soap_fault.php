<?php




/**
* Contains information for a SOAP fault.
* Mainly used for returning faults from deployed functions
* in a server instance.
 *
* @version  $Id: class.soap_fault.php,v 1.14 2007/04/11 15:49:47 snichol Exp $
*/
class nusoap_fault extends nusoap_base {
	/**
	 * The fault code (client|server)
	 *
	 * @var string
	 */
	public $faultcode;
	/**
	 * The fault actor
	 *
	 * @var string
	 */
	public $faultactor;
	/**
	 * The fault string, a description of the fault
	 *
	 * @var string
	 */
	public $faultstring;
	/**
	 * The fault detail, typically a string or array of string
	 *
	 * @var mixed
	 */
	public $faultdetail;

	/**
	* Constructor
	*
	* @param string $faultcode (SOAP-ENV:Client | SOAP-ENV:Server)
	* @param string $faultactor only used when msg routed between multiple actors
	* @param string $faultstring human readable error message
	* @param mixed $faultdetail detail, typically a string or array of string
	*/
	public function __construct( $faultcode, $faultactor = '', $faultstring = '', $faultdetail = '') {
		parent::nusoap_base();
		$this->faultcode   = $faultcode;
		$this->faultactor  = $faultactor;
		$this->faultstring = $faultstring;
		$this->faultdetail = $faultdetail;
	}

	/**
	* Serialize a fault
	*
	* @return	string	The serialization of the fault instance.
	*/
	public function serialize() {
		$ns_string = '';
		foreach ($this->namespaces as $k => $v) {
			$ns_string .= "\n  xmlns:$k=\"$v\"";
		}
		$return_msg =
			'<?xml version="1.0" encoding="' . $this->soap_defencoding . '"?>' .
			'<SOAP-ENV:Envelope SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"' . $ns_string . ">\n" .
				'<SOAP-ENV:Body>' .
				'<SOAP-ENV:Fault>' .
					$this->serialize_val($this->faultcode, 'faultcode') .
					$this->serialize_val($this->faultactor, 'faultactor') .
					$this->serialize_val($this->faultstring, 'faultstring') .
					$this->serialize_val($this->faultdetail, 'detail') .
				'</SOAP-ENV:Fault>' .
				'</SOAP-ENV:Body>' .
			'</SOAP-ENV:Envelope>';
		return $return_msg;
	}
}

/**
 * Backward compatibility
 */
class soap_fault extends nusoap_fault {
}



