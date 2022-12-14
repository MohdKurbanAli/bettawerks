<?php 
/**
 * UATP card details Required 
 */
class DoUATPAuthorizationRequestType  extends AbstractRequestType  
  {

	/**
	 * UATP card details Required 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var UATPDetailsType 	 
	 */ 
	public $UATPDetails;

	/**
	 * Type of transaction to authorize. The only allowable value
	 * is Order, which means that the transaction represents a
	 * customer order that can be fulfilled over 29 days. Optional
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $TransactionEntity;

	/**
	 * Amount to authorize. Required Limitations: Must not exceed
	 * $10,000 USD in any currency. No currency symbol. Decimal
	 * separator must be a period (.), and the thousands separator
	 * must be a comma (,).
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var BasicAmountType 	 
	 */ 
	public $Amount;

	/**
	 * Invoice ID. A pass through. 
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $InvoiceID;

	/**
	 * Unique id for each API request to prevent duplicate
	 * payments. Optional Character length and limits: 38
	 * single-byte characters maximum. 
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $MsgSubID;

	/**
	 * Constructor with arguments
	 */
	public function __construct($UATPDetails = NULL, $Amount = NULL) {
		$this->UATPDetails = $UATPDetails;
		$this->Amount = $Amount;
	}


  
 
}
