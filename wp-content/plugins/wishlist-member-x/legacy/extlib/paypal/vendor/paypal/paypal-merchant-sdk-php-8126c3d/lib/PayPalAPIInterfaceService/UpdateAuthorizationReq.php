<?php 
/**
 * 
 */
class UpdateAuthorizationReq  
   extends PPXmlMessage{

	/**
	 * 
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var UpdateAuthorizationRequestType 	 
	 */ 
	public $UpdateAuthorizationRequest;


	public function toXMLString()
	{
		    $str = '';
			$str .= '<ns:UpdateAuthorizationReq>';
			if(NULL != $this->UpdateAuthorizationRequest)
			{
		   		$str .= '<ns:UpdateAuthorizationRequest>';
				$str .= $this->UpdateAuthorizationRequest->toXMLString();
				$str .= '</ns:UpdateAuthorizationRequest>';
			}
			$str .= '</ns:UpdateAuthorizationReq>';
			return $str;
	}
  
 
}
