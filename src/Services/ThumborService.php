<?php declare(strict_types = 1);

namespace Adbros\RemoteImageProcessor\Services;

use Nette\Utils\Strings;

class ThumborService implements ServiceInterface
{

	/** @var string */
	protected $thumborUrl;

	/** @var string */
	protected $securityKey;

	public function __construct(string $thumborUrl, ?string $securityKey = null)
	{
		$this->thumborUrl = $thumborUrl;
		$this->securityKey = $securityKey;
	}

	public function processImage(string $imageUrl, ?string $modifier = null): string
	{
		$path = ($modifier !== null ? $modifier . '/' : '') . Strings::replace($imageUrl, '~https?://~');

		$signature = $this->securityKey !== null
			? $this->sign($path)
			: 'unsafe';

		return $this->thumborUrl . '/' . $signature . '/' . $path;
	}

	protected function sign(string $path): string
	{
		$signature = hash_hmac('sha1', $path, $this->securityKey, true);

		return strtr(
			base64_encode($signature),
			'/+', '_-'
		);
	}

}
