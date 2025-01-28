<?php declare(strict_types = 1);

namespace Adbros\RemoteImageProcessor\Services;

use InvalidArgumentException;
use Nette\Utils\Strings;

class ThumborService extends BaseService implements IService
{

	protected string $thumborUrl;

	protected ?string $securityKey;

	public function __construct(string $thumborUrl, ?string $securityKey = null)
	{
		$this->thumborUrl = $thumborUrl;
		$this->securityKey = $securityKey;
	}

	public function processImage(string $imageUrl, ?string $alias = null): string
	{
		if ($alias !== null && !isset($this->getAliases()[$alias])) {
			throw new InvalidArgumentException('Invalid image alias.');
		}

		$path = ($alias !== null ? $this->getAliases()[$alias] . '/' : '') . Strings::replace($imageUrl, '~https?://~');

		$signature = $this->securityKey !== null
			? $this->sign($path)
			: 'unsafe';

		return $this->thumborUrl . '/' . $signature . '/' . $path;
	}

	protected function sign(string $path): string
	{
		$signature = hash_hmac('sha1', $path, $this->securityKey ?? '', true);

		return strtr(
			base64_encode($signature),
			'/+',
			'_-'
		);
	}

}
