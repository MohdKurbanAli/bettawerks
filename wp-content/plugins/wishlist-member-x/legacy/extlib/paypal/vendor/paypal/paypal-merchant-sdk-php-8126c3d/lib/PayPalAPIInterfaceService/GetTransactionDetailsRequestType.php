<?php 
/**
 * Unique identifier of a transaction. RequiredThe details for
 * some kinds of transactions cannot be retrieved with
 * GetTransactionDetailsRequest. You cannot obtain details of
 * bank transfer withdrawals, for example. Character length and
 * limitations: 17 single-byte alphanumeric characters
 */
class GetTransactionDetailsRequestType  extends AbstractRequestType  
  {

	/**
	 * Unique identifier of a transaction. RequiredThe details for
	 * some kinds of transactions cannot be retrieved with
	 * GetTransactionDetailsRequest. You cannot obtain details of
	 * bank transfer withdrawals, for example. Character length and
	 * limitations: 17 single-byte alphanumeric characters
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $TransactionID;


  
 
}
