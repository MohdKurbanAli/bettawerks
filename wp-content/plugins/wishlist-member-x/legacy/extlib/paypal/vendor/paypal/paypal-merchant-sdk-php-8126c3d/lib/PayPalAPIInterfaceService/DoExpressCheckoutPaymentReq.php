<?php 
/**
 * 
 */
class DoExpressCheckoutPaymentReq  
   extends PPXmlMessage{

	/**
	 * 
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var DoExpressCheckoutPaymentRequestType 	 
	 */ 
	public $DoExpressCheckoutPaymentRequest;


	public function toXMLString()
	{
		    $str = '';
			$str .= '<ns:DoExpressCheckoutPaymentReq>';
			if(NULL != $this->DoExpressCheckoutPaymentRequest)
			{
		   		$str .= '<ns:DoExpressCheckoutPaymentRequest>';
				$str .= $this->DoExpressCheckoutPaymentRequest->toXMLString();
				$str .= '</ns:DoExpressCheckoutPaymentRequest>';
			}
			$str .= '</ns:DoExpressCheckoutPaymentReq>';
			return $str;
	}
  
 
}
