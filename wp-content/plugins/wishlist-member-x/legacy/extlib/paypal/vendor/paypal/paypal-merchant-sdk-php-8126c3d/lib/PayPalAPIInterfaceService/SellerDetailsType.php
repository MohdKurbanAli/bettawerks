<?php 
/**
 * Details about the seller. 
 */
class SellerDetailsType  
   extends PPXmlMessage{

	/**
	 * Unique identifier for the seller. Optional 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $SellerId;

	/**
	 * The user name of the user at the marketplaces site. Optional
	 * 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $SellerUserName;

	/**
	 * Date when the user registered with the marketplace. Optional
	 * 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var dateTime 	 
	 */ 
	public $SellerRegistrationDate;

	/**
	 * Seller Paypal Account Id contains the seller EmailId or
	 * PayerId or PhoneNo passed during the Request. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $PayPalAccountID;

	/**
	 * Unique PayPal customer account identification number (of the
	 * seller). This feild is meant for Response. This field is
	 * ignored, if passed in the Request. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $SecureMerchantAccountID;


  
 
}
