<?php 
/**
 * Information about the incentives that were applied from Ebay
 * RYP page and PayPal RYP page. 
 */
class IncentiveDetailsType  
   extends PPXmlMessage{

	/**
	 * Unique Identifier consisting of redemption code, user
	 * friendly descripotion, incentive type, campaign code,
	 * incenitve application order and site redeemed on. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $UniqueIdentifier;

	/**
	 * Defines if the incentive has been applied on Ebay or PayPal.
	 * 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $SiteAppliedOn;

	/**
	 * The total discount amount for the incentive, summation of
	 * discounts up across all the buckets/items. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var BasicAmountType 	 
	 */ 
	public $TotalDiscountAmount;

	/**
	 * Status of incentive processing. Sussess or Error. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $Status;

	/**
	 * Error code if there are any errors. Zero otherwise. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var integer 	 
	 */ 
	public $ErrorCode;

	/**
	 * Details of incentive application on individual bucket/item. 
     * @array
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var IncentiveAppliedDetailsType 	 
	 */ 
	public $IncentiveAppliedDetails;


}
