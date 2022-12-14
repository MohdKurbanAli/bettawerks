<?php 
/**
 * PaymentDetailsItemType Information about a Payment Item. 
 */
class PaymentDetailsItemType  
   extends PPXmlMessage{

	/**
	 * Item name. Optional Character length and limitations: 127
	 * single-byte characters
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $Name;

	/**
	 * Item number. Optional Character length and limitations: 127
	 * single-byte characters
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $Number;

	/**
	 * Item quantity. Optional Character length and limitations:
	 * Any positive integer
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var integer 	 
	 */ 
	public $Quantity;

	/**
	 * Item sales tax. Optional Character length and limitations:
	 * any valid currency amount; currency code is set the same as
	 * for OrderTotal.
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var BasicAmountType 	 
	 */ 
	public $Tax;

	/**
	 * Cost of item You must set the currencyID attribute to one of
	 * the three-character currency codes for any of the supported
	 * PayPal currencies. Optional Limitations: Must not exceed
	 * $10,000 USD in any currency. No currency symbol. Decimal
	 * separator must be a period (.), and the thousands separator
	 * must be a comma (,).
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var BasicAmountType 	 
	 */ 
	public $Amount;

	/**
	 * Ebay specific details. Optional 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var EbayItemPaymentDetailsItemType 	 
	 */ 
	public $EbayItemPaymentDetailsItem;

	/**
	 * Promotional financing code for item. Part of the Merchant
	 * Services Promotion Financing feature. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $PromoCode;

	/**
	 * 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $ProductCategory;

	/**
	 * Item description. Optional Character length and limitations:
	 * 127 single-byte characters 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $Description;

	/**
	 * Information about the Item weight. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var MeasureType 	 
	 */ 
	public $ItemWeight;

	/**
	 * Information about the Item length. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var MeasureType 	 
	 */ 
	public $ItemLength;

	/**
	 * Information about the Item width. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var MeasureType 	 
	 */ 
	public $ItemWidth;

	/**
	 * Information about the Item height. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var MeasureType 	 
	 */ 
	public $ItemHeight;

	/**
	 * URL for the item. Optional Character length and limitations:
	 * no limit. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $ItemURL;

	/**
	 * Enhanced data for each item in the cart. Optional 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var EnhancedItemDataType 	 
	 */ 
	public $EnhancedItemData;

	/**
	 * Item category - physical or digital. Optional 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $ItemCategory;


  
 
}
