<?php declare(strict_types = 1);

use Adbros\RemoteImageProcessor\Services\DummyService;
use Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

test(function (): void {
	$service = new DummyService();

	$service->setAliases([
		'size1' => 'fit-in/400x400',
		'size2' => 'fit-in/800x800',
	]);

	$url = $service->processImage('https://image.url/image.jpg', 'size1');
	Assert::same('https://image.url/image.jpg', $url);

	$url = $service->processImage('https://image.url/image.jpg', 'size2');
	Assert::same('https://image.url/image.jpg', $url);
});
