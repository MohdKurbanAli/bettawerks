<?php 
/**
 * Unique identifier of the transaction you are refunding.
 * Optional Character length and limitations: 17 single-byte
 * alphanumeric characters 
 */
class RefundTransactionRequestType  extends AbstractRequestType  
  {

	/**
	 * Unique identifier of the transaction you are refunding.
	 * Optional Character length and limitations: 17 single-byte
	 * alphanumeric characters 
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $TransactionID;

	/**
	 * Encrypted PayPal customer account identification number.
	 * Optional Character length and limitations: 127 single-byte
	 * alphanumeric characters
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $PayerID;

	/**
	 * Invoice number corresponding to transaction details for
	 * tracking the refund of a payment. This parameter is passed
	 * by the merchant or recipient while refunding the
	 * transaction. This parameter does not affect the business
	 * logic, it is persisted in the DB for transaction reference
	 * Optional 
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $InvoiceID;

	/**
	 * Type of refund you are making Required 
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $RefundType;

	/**
	 * Refund amount. Amount is required if RefundType is Partial.
	 * NOTE: If RefundType is Full, do not set Amount.
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var BasicAmountType 	 
	 */ 
	public $Amount;

	/**
	 * Custom memo about the refund. Optional Character length and
	 * limitations: 255 single-byte alphanumeric characters
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $Memo;

	/**
	 * The maximum time till which refund must be tried. Optional 
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var dateTime 	 
	 */ 
	public $RetryUntil;

	/**
	 * The type of funding source for refund. Optional 
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $RefundSource;

	/**
	 * Flag to indicate that the customer was already given store
	 * credit for a given transaction. This will allow us to make
	 * sure we do not double refund. Optional 
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var boolean 	 
	 */ 
	public $RefundAdvice;

	/**
	 * To pass the Merchant store informationOptional 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var MerchantStoreDetailsType 	 
	 */ 
	public $MerchantStoreDetails;

	/**
	 * Information about the individual details of the items to be
	 * refunded.Optional 
     * @array
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var InvoiceItemType 	 
	 */ 
	public $RefundItemDetails;

	/**
	 * Unique id for each API request to prevent duplicate
	 * payments. Optional Character length and limits: 38
	 * single-byte characters maximum. 
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $MsgSubID;


  
 
}
