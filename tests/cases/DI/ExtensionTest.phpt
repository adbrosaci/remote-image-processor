<?php declare(strict_types = 1);

use Adbros\RemoteImageProcessor\DI\Extension;
use Adbros\RemoteImageProcessor\Services\DummyService;
use Adbros\RemoteImageProcessor\Services\IService;
use Contributte\Tester\Environment;
use Nette\Bridges\ApplicationDI\LatteExtension;
use Nette\DI\Compiler;
use Nette\DI\Container;
use Nette\DI\ContainerLoader;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

test('Extension', function (): void {
	$loader = new ContainerLoader(Environment::getTmpDir(), true);
	$class = $loader->load(function (Compiler $compiler): void {
		$compiler->addExtension('latte', new LatteExtension(Environment::getTmpDir() . '/cache/latte'));

		$compiler->addExtension('rip', new Extension())
			->addConfig([
				'rip' => [
					'service' => DummyService::class,
				],
			]);
	}, 1);

	/** @var Container $container */
	$container = new $class();

	Assert::type(DummyService::class, $container->getByType(IService::class));
});
