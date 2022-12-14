<?php 
/**
 * BusinessOwnerInfoType 
 */
class BusinessOwnerInfoType  
   extends PPXmlMessage{

	/**
	 * Details about the business owner
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var PayerInfoType 	 
	 */ 
	public $Owner;

	/**
	 * Business ownerâs home telephone number Character length and
	 * limitations: 32 alphanumeric characters
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $HomePhone;

	/**
	 * Business ownerâs mobile telephone number Character length
	 * and limitations: 32 alphanumeric characters
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $MobilePhone;

	/**
	 * Business ownerâs social security number Character length
	 * and limitations: 9 alphanumeric characters
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $SSN;


  
 
}
