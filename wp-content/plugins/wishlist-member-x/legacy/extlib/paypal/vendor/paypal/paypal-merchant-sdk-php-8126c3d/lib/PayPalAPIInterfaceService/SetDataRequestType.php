<?php 
/**
 * Details about Billing Agreements requested to be created. 
 */
class SetDataRequestType  
   extends PPXmlMessage{

	/**
	 * Details about Billing Agreements requested to be created. 
     * @array
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var BillingApprovalDetailsType 	 
	 */ 
	public $BillingApprovalDetails;

	/**
	 * Only needed if Auto Authorization is requested. The
	 * authentication session token will be passed in here. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var BuyerDetailType 	 
	 */ 
	public $BuyerDetail;

	/**
	 * Requests for specific buyer information like Billing Address
	 * to be returned through GetExpressCheckoutDetails should be
	 * specified under this. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var InfoSharingDirectivesType 	 
	 */ 
	public $InfoSharingDirectives;

	/**
	 * The value 1 indicates that you require to retrieve the
	 * customer's shipping address on file with PayPal. Any value
	 * other than 1 indicates that no such requirement. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var boolean 	 
	 */ 
	public $RetrieveShippingAddress;

	/**
	 * the value is required by ACS team to specify the channel
	 * which the partners are in. the channel will be used for risk
	 * assessment the value is defined in
	 * biz/User/value_object/Channel.oml Optional 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $UserChannel;

	/**
	 * The value 1 indicates that you require that the customer's
	 * shipping address on file with PayPal be a confirmed address.
	 * Any value other than 1 indicates that the customer's
	 * shipping address on file with PayPal need NOT be a confirmed
	 * address. Setting this element overrides the setting you have
	 * specified in the recipient's Merchant Account Profile.
	 * Optional 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var boolean 	 
	 */ 
	public $ReqConfirmShipping;

	/**
	 * Information about the payment. 
     * @array
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var PaymentDetailsType 	 
	 */ 
	public $PaymentDetails;

	/**
	 * An optional set of values related to tracking for external
	 * partner. 
	 
	 * @namespace ebl
	 
	 	 	 	 
	 * @var ExternalPartnerTrackingDetailsType 	 
	 */ 
	public $ExternalPartnerTrackingDetails;


  
 
}
