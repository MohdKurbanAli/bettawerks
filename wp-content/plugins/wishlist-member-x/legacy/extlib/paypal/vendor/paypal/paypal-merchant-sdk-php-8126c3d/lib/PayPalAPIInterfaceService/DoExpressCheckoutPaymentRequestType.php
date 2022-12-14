<?php 
/**
 * This flag indicates that the response should include
 * FMFDetails 
 */
class DoExpressCheckoutPaymentRequestType  extends AbstractRequestType  
  {

	/**
	 * 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var DoExpressCheckoutPaymentRequestDetailsType 	 
	 */ 
	public $DoExpressCheckoutPaymentRequestDetails;

	/**
	 * This flag indicates that the response should include
	 * FMFDetails
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var integer 	 
	 */ 
	public $ReturnFMFDetails;

	/**
	 * Constructor with arguments
	 */
	public function __construct($DoExpressCheckoutPaymentRequestDetails = NULL) {
		$this->DoExpressCheckoutPaymentRequestDetails = $DoExpressCheckoutPaymentRequestDetails;
	}


  
 
}
