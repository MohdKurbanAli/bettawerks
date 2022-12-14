<?php 
/**
 * Details about the buyer's account passed in by the merchant
 * or partner. Optional. 
 */
class BuyerDetailsType  
   extends PPXmlMessage{

	/**
	 * The client's unique ID for this user. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $BuyerId;

	/**
	 * The user name of the user at the marketplaces site. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $BuyerUserName;

	/**
	 * Date when the user registered with the marketplace. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var dateTime 	 
	 */ 
	public $BuyerRegistrationDate;

	/**
	 * Details about payer's tax info. Refer to the
	 * TaxIdDetailsType for more details. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var TaxIdDetailsType 	 
	 */ 
	public $TaxIdDetails;

	/**
	 * Contains information that identifies the buyer. e.g. email
	 * address or the external remember me id. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var IdentificationInfoType 	 
	 */ 
	public $IdentificationInfo;


  
 
}
