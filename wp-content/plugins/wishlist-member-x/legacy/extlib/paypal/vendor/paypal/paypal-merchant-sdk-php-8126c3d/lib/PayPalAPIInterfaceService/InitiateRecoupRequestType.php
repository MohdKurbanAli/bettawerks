<?php 
/**
 * 
 */
class InitiateRecoupRequestType  extends AbstractRequestType  
  {

	/**
	 * 
	 
	 * @namespace ed
	 
	 	 	 	 
	 * @var EnhancedInitiateRecoupRequestDetailsType 	 
	 */ 
	public $EnhancedInitiateRecoupRequestDetails;

	/**
	 * Constructor with arguments
	 */
	public function __construct($EnhancedInitiateRecoupRequestDetails = NULL) {
		$this->EnhancedInitiateRecoupRequestDetails = $EnhancedInitiateRecoupRequestDetails;
	}


  
 
}
