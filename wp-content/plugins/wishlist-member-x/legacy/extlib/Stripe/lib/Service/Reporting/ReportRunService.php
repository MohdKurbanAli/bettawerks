<?php

namespace WLMStripe\Service\Reporting;

class ReportRunService extends \WLMStripe\Service\AbstractService {

	/**
	 * Returns a list of Report Runs, with the most recent appearing first. (Requires a
	 * <a href="https://stripe.com/docs/keys#test-live-modes">live-mode API key</a>.).
	 *
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Collection
	 */
	public function all( $params = null, $opts = null) {
		return $this->requestCollection('get', '/v1/reporting/report_runs', $params, $opts);
	}

	/**
	 * Creates a new object and begin running the report. (Requires a <a
	 * href="https://stripe.com/docs/keys#test-live-modes">live-mode API key</a>.).
	 *
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Reporting\ReportRun
	 */
	public function create( $params = null, $opts = null) {
		return $this->request('post', '/v1/reporting/report_runs', $params, $opts);
	}

	/**
	 * Retrieves the details of an existing Report Run. (Requires a <a
	 * href="https://stripe.com/docs/keys#test-live-modes">live-mode API key</a>.).
	 *
	 * @param string $id
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Reporting\ReportRun
	 */
	public function retrieve( $id, $params = null, $opts = null) {
		return $this->request('get', $this->buildPath('/v1/reporting/report_runs/%s', $id), $params, $opts);
	}
}
