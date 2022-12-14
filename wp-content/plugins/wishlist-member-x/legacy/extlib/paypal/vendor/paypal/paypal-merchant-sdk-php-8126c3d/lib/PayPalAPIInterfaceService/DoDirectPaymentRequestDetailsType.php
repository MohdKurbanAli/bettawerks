<?php 
/**
 * How you want to obtain payment. Required Authorization
 * indicates that this payment is a basic authorization subject
 * to settlement with PayPal Authorization and Capture. Sale
 * indicates that this is a final sale for which you are
 * requesting payment. NOTE: Order is not allowed for Direct
 * Payment. Character length and limit: Up to 13 single-byte
 * alphabetic characters 
 */
class DoDirectPaymentRequestDetailsType  
   extends PPXmlMessage{

	/**
	 * How you want to obtain payment. Required Authorization
	 * indicates that this payment is a basic authorization subject
	 * to settlement with PayPal Authorization and Capture. Sale
	 * indicates that this is a final sale for which you are
	 * requesting payment. NOTE: Order is not allowed for Direct
	 * Payment. Character length and limit: Up to 13 single-byte
	 * alphabetic characters
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $PaymentAction;

	/**
	 * Information about the payment Required 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var PaymentDetailsType 	 
	 */ 
	public $PaymentDetails;

	/**
	 * Information about the credit card to be charged. Required 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var CreditCardDetailsType 	 
	 */ 
	public $CreditCard;

	/**
	 * IP address of the payer's browser as recorded in its HTTP
	 * request to your website. PayPal records this IP addresses as
	 * a means to detect possible fraud. Required Character length
	 * and limitations: 15 single-byte characters, including
	 * periods, in dotted-quad format: ???.???.???.???
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $IPAddress;

	/**
	 * Your customer session identification token. PayPal records
	 * this optional session identification token as an additional
	 * means to detect possible fraud. Optional Character length
	 * and limitations: 64 single-byte numeric characters
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $MerchantSessionId;

	/**
	 * 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var boolean 	 
	 */ 
	public $ReturnFMFDetails;


  
 
}
