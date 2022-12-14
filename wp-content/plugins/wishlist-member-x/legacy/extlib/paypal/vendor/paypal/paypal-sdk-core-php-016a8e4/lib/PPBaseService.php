<?php

class PPBaseService {

	private $serviceName;
	private $serviceBinding;
	private $handlers;

	protected $config;		
	protected $lastRequest;
	protected $lastResponse;

    public function getLastRequest() {
		return $this->lastRequest;
	}
    public function getLastResponse() {
		return $this->lastResponse;
	}

	public function getServiceName() {
		return $this->serviceName;
	}

	public function __construct($serviceName, $serviceBinding, $config=null) {
		$this->serviceName = $serviceName;
		$this->serviceBinding = $serviceBinding;
		$this->config = $config;
	}

	/**
	 * 
	 * @param string $method - API method to call
	 * @param object $requestObject Request object 
	 * @param apiContext $apiContext object containing credential and SOAP headers
	 * @param mixed $apiUserName - Optional API credential - can either be
	 * 		a username configured in sdk_config.ini or a ICredential object created dynamically 		
	 */
	public function call($port, $method, $requestObject, $apiContext, $handlers) {

		if(null == $apiContext)
		{
			$apiContext = new PPApiContext(PPConfigManager::getConfigWithDefaults($this->config));
		}
 		if(null == $apiContext->getConfig() )
		{			
			$apiContext->setConfig(PPConfigManager::getConfigWithDefaults($this->config));
		}

		$service = new PPAPIService($port, $this->serviceName,
				$this->serviceBinding, $apiContext, $handlers);
		$ret = $service->makeRequest($method, new PPRequest($requestObject, $this->serviceBinding));
		$this->lastRequest = $ret['request'];
		$this->lastResponse = $ret['response'];
		return $this->lastResponse;
	}


}
