<?php declare(strict_types = 1);

namespace Adbros\RemoteImageProcessor\Services;

class DummyService extends BaseService implements IService
{

	public function processImage(string $imageUrl, ?string $alias = null): string
	{
		return $imageUrl;
	}

}
