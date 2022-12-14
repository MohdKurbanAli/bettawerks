<?php 
/**
 * Unique transaction identifier of the reversal transaction
 * created. Character length and limitations:17 single-byte
 * characters 
 */
class ReverseTransactionResponseDetailsType  
   extends PPXmlMessage{

	/**
	 * Unique transaction identifier of the reversal transaction
	 * created. Character length and limitations:17 single-byte
	 * characters 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $ReverseTransactionID;

	/**
	 * Status of reversal request. Required 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $Status;


}
