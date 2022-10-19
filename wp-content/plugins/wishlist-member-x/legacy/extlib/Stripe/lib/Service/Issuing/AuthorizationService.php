<?php

namespace WLMStripe\Service\Issuing;

class AuthorizationService extends \WLMStripe\Service\AbstractService {

	/**
	 * Returns a list of Issuing <code>Authorization</code> objects. The objects are
	 * sorted in descending order by creation date, with the most recently created
	 * object appearing first.
	 *
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Collection
	 */
	public function all( $params = null, $opts = null) {
		return $this->requestCollection('get', '/v1/issuing/authorizations', $params, $opts);
	}

	/**
	 * Approves a pending Issuing <code>Authorization</code> object. This request
	 * should be made within the timeout window of the <a
	 * href="/docs/issuing/controls/real-time-authorizations">real-time
	 * authorization</a> flow.
	 *
	 * @param string $id
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Issuing\Authorization
	 */
	public function approve( $id, $params = null, $opts = null) {
		return $this->request('post', $this->buildPath('/v1/issuing/authorizations/%s/approve', $id), $params, $opts);
	}

	/**
	 * Declines a pending Issuing <code>Authorization</code> object. This request
	 * should be made within the timeout window of the <a
	 * href="/docs/issuing/controls/real-time-authorizations">real time
	 * authorization</a> flow.
	 *
	 * @param string $id
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Issuing\Authorization
	 */
	public function decline( $id, $params = null, $opts = null) {
		return $this->request('post', $this->buildPath('/v1/issuing/authorizations/%s/decline', $id), $params, $opts);
	}

	/**
	 * Retrieves an Issuing <code>Authorization</code> object.
	 *
	 * @param string $id
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Issuing\Authorization
	 */
	public function retrieve( $id, $params = null, $opts = null) {
		return $this->request('get', $this->buildPath('/v1/issuing/authorizations/%s', $id), $params, $opts);
	}

	/**
	 * Updates the specified Issuing <code>Authorization</code> object by setting the
	 * values of the parameters passed. Any parameters not provided will be left
	 * unchanged.
	 *
	 * @param string $id
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Issuing\Authorization
	 */
	public function update( $id, $params = null, $opts = null) {
		return $this->request('post', $this->buildPath('/v1/issuing/authorizations/%s', $id), $params, $opts);
	}
}
