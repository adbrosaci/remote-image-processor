<?php declare(strict_types = 1);

namespace Adbros\RemoteImageProcessor\Template;

use Adbros\RemoteImageProcessor\Services\IService;

class Filters
{

	/** @var IService */
	protected $service;

	public function __construct(IService $service)
	{
		$this->service = $service;
	}

	public function processImage(string $url, ?string $alias = null): string
	{
		return $this->service->processImage($url, $alias);
	}

}
