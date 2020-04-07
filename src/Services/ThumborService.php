<?php declare(strict_types = 1);

namespace Adbros\RemoteImageProcessor\Services;

use Nette\Utils\Strings;

class ThumborService implements ServiceInterface
{

	/** @var string */
	protected $thumborUrl;

	public function __construct(string $thumborUrl)
	{
		$this->thumborUrl = $thumborUrl;
	}

	public function processImage(string $imageUrl, ?string $modifier = null): string
	{
		return $this->thumborUrl . '/unsafe/' . ($modifier !== null ? $modifier . '/' : '') . Strings::replace($imageUrl, '~https?://~');
	}

}