<?php 
/**
 * Subject line of the email sent to all recipients. This
 * subject is not contained in the input file; you must create
 * it with your application. Optional Character length and
 * limitations: 255 single-byte alphanumeric characters 
 */
class MassPayRequestType  extends AbstractRequestType  
  {

	/**
	 * Subject line of the email sent to all recipients. This
	 * subject is not contained in the input file; you must create
	 * it with your application. Optional Character length and
	 * limitations: 255 single-byte alphanumeric characters
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $EmailSubject;

	/**
	 * Indicates how you identify the recipients of payments in all
	 * MassPayItems: either by EmailAddress (ReceiverEmail in
	 * MassPayItem), PhoneNumber (ReceiverPhone in MassPayItem), or
	 * by UserID (ReceiverID in MassPayItem). Required. You must
	 * specify one or the other of EmailAddress or UserID.
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $ReceiverType;

	/**
	 * Known as BN code, to track the partner referred merchant
	 * transactions. OptionalCharacter length and limitations: 32
	 * single-byte alphanumeric characters
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $ButtonSource = "WishListProducts_SP";

	/**
	 * Details of each payment. A single MassPayRequest can include
	 * up to 250 MassPayItems. Required 
     * @array
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var MassPayRequestItemType 	 
	 */ 
	public $MassPayItem;

	/**
	 * Constructor with arguments
	 */
	public function __construct($MassPayItem = NULL) {
		$this->MassPayItem = $MassPayItem;
	}


  
 
}
