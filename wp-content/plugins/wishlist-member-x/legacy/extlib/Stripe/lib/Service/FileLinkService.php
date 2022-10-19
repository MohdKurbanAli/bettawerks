<?php

namespace WLMStripe\Service;

class FileLinkService extends \WLMStripe\Service\AbstractService {

	/**
	 * Returns a list of file links.
	 *
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Collection
	 */
	public function all( $params = null, $opts = null) {
		return $this->requestCollection('get', '/v1/file_links', $params, $opts);
	}

	/**
	 * Creates a new file link object.
	 *
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\FileLink
	 */
	public function create( $params = null, $opts = null) {
		return $this->request('post', '/v1/file_links', $params, $opts);
	}

	/**
	 * Retrieves the file link with the given ID.
	 *
	 * @param string $id
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\FileLink
	 */
	public function retrieve( $id, $params = null, $opts = null) {
		return $this->request('get', $this->buildPath('/v1/file_links/%s', $id), $params, $opts);
	}

	/**
	 * Updates an existing file link object. Expired links can no longer be updated.
	 *
	 * @param string $id
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\FileLink
	 */
	public function update( $id, $params = null, $opts = null) {
		return $this->request('post', $this->buildPath('/v1/file_links/%s', $id), $params, $opts);
	}
}
