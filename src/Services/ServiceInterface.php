<?php declare(strict_types = 1);

namespace Adbros\RemoteImageProcessor\Services;

interface ServiceInterface
{

	public function processImage(string $imageUrl, ?string $modifier = null): string;

}