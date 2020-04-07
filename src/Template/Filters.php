<?php declare(strict_types = 1);

namespace Adbros\RemoteImageProcessor\Template;

use Adbros\RemoteImageProcessor\Services\ServiceInterface;
use InvalidArgumentException;

class Filters
{

	/** @var string[] */
	protected $aliases;

	/** @var ServiceInterface */
	protected $service;

	/**
	 * @param string[] $aliases
	 */
	public function __construct($aliases, ServiceInterface $service)
	{
		$this->aliases = $aliases;
		$this->service = $service;
	}

	public function processImage(string $url, ?string $alias = null): string
	{
		if ($alias !== null && !isset($this->aliases[$alias])) {
			throw new InvalidArgumentException('Invalid image alias.');
		}

		return $this->service->processImage($url, $alias !== null ? $this->aliases[$alias] : null);
	}

}