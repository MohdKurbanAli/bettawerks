<?php

namespace WLMStripe\Service;

class PlanService extends \WLMStripe\Service\AbstractService {

	/**
	 * Returns a list of your plans.
	 *
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Collection
	 */
	public function all( $params = null, $opts = null) {
		return $this->requestCollection('get', '/v1/plans', $params, $opts);
	}

	/**
	 * You can create plans using the API, or in the Stripe <a
	 * href="https://dashboard.stripe.com/products">Dashboard</a>.
	 *
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Plan
	 */
	public function create( $params = null, $opts = null) {
		return $this->request('post', '/v1/plans', $params, $opts);
	}

	/**
	 * Deleting plans means new subscribers can’t be added. Existing subscribers aren’t
	 * affected.
	 *
	 * @param string $id
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Plan
	 */
	public function delete( $id, $params = null, $opts = null) {
		return $this->request('delete', $this->buildPath('/v1/plans/%s', $id), $params, $opts);
	}

	/**
	 * Retrieves the plan with the given ID.
	 *
	 * @param string $id
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Plan
	 */
	public function retrieve( $id, $params = null, $opts = null) {
		return $this->request('get', $this->buildPath('/v1/plans/%s', $id), $params, $opts);
	}

	/**
	 * Updates the specified plan by setting the values of the parameters passed. Any
	 * parameters not provided are left unchanged. By design, you cannot change a
	 * plan’s ID, amount, currency, or billing cycle.
	 *
	 * @param string $id
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Plan
	 */
	public function update( $id, $params = null, $opts = null) {
		return $this->request('post', $this->buildPath('/v1/plans/%s', $id), $params, $opts);
	}
}
