<?php declare(strict_types = 1);

use Adbros\RemoteImageProcessor\Services\ThumborService;
use Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

test(function (): void {
	$service = new ThumborService('https://thumbor.url');

	$service->setAliases([
		'size1' => 'fit-in/400x400',
		'size2' => 'fit-in/800x800',
	]);

	$url = $service->processImage('https://image.url/image.jpg', 'size1');
	Assert::same('https://thumbor.url/unsafe/fit-in/400x400/image.url/image.jpg', $url);

	$url = $service->processImage('https://image.url/image.jpg', 'size2');
	Assert::same('https://thumbor.url/unsafe/fit-in/800x800/image.url/image.jpg', $url);
});
