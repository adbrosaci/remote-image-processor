<?php declare(strict_types = 1);

namespace Adbros\RemoteImageProcessor\Services;

class DummyService implements ServiceInterface
{

	public function processImage(string $imageUrl, ?string $modifier = null): string
	{
		return $imageUrl;
	}

}