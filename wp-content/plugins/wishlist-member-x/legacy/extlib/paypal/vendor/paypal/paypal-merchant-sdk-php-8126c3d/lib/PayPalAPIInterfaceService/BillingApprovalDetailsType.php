<?php 
/**
 * The Type of Approval requested - Billing Agreement or
 * Profile 
 */
class BillingApprovalDetailsType  
   extends PPXmlMessage{

	/**
	 * The Type of Approval requested - Billing Agreement or
	 * Profile
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $ApprovalType;

	/**
	 * The Approval subtype - Must be MerchantInitiatedBilling for
	 * BillingAgreement ApprovalType
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $ApprovalSubType;

	/**
	 * Description about the Order
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var OrderDetailsType 	 
	 */ 
	public $OrderDetails;

	/**
	 * Directives about the type of payment
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var PaymentDirectivesType 	 
	 */ 
	public $PaymentDirectives;

	/**
	 * Client may pass in its identification of this Billing
	 * Agreement. It used for the client's tracking purposes.
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $Custom;

	/**
	 * Constructor with arguments
	 */
	public function __construct($ApprovalType = NULL) {
		$this->ApprovalType = $ApprovalType;
	}


  
 
}
