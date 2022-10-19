<?php

namespace WLMStripe\Service;

class FileService extends \WLMStripe\Service\AbstractService {

	/**
	 * Returns a list of the files that your account has access to. The files are
	 * returned sorted by creation date, with the most recently created files appearing
	 * first.
	 *
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\Collection
	 */
	public function all( $params = null, $opts = null) {
		return $this->requestCollection('get', '/v1/files', $params, $opts);
	}

	/**
	 * Retrieves the details of an existing file object. Supply the unique file ID from
	 * a file, and Stripe will return the corresponding file object. To access file
	 * contents, see the <a href="/docs/file-upload#download-file-contents">File Upload
	 * Guide</a>.
	 *
	 * @param string $id
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @throws \WLMStripe\Exception\ApiErrorException if the request fails
	 *
	 * @return \WLMStripe\File
	 */
	public function retrieve( $id, $params = null, $opts = null) {
		return $this->request('get', $this->buildPath('/v1/files/%s', $id), $params, $opts);
	}

	/**
	 * Create a file.
	 *
	 * @param null|array $params
	 * @param null|array|\WLMStripe\Util\RequestOptions $opts
	 *
	 * @return \WLMStripe\File
	 */
	public function create( $params = null, $opts = null) {
		$opts = \WLMStripe\Util\RequestOptions::parse($opts);
		if (!isset($opts->apiBase)) {
			$opts->apiBase = $this->getClient()->getFilesBase();
		}

		// Manually flatten params, otherwise curl's multipart encoder will
		// choke on nested null|arrays.
		$flatParams = \array_column(\WLMStripe\Util\Util::flattenParams($params), 1, 0);

		return $this->request('post', '/v1/files', $flatParams, $opts);
	}
}
