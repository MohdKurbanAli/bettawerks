<?php 
/**
 * A unique token that identifies this boarding session. Use
 * this token with the GetBoarding Details API call.Character
 * length and limitations: 64 alphanumeric characters. The
 * token has the following format:OB-61characterstring
 */
class EnterBoardingResponseType  extends AbstractResponseType  
  {

	/**
	 * A unique token that identifies this boarding session. Use
	 * this token with the GetBoarding Details API call.Character
	 * length and limitations: 64 alphanumeric characters. The
	 * token has the following format:OB-61characterstring
	 
	 * @namespace ns
	 
	 	 	 	 
	 * @var string 	 
	 */ 
	public $Token;


}
