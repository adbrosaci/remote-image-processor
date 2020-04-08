<?php declare(strict_types = 1);

namespace Adbros\RemoteImageProcessor\DI;

use Adbros\RemoteImageProcessor\Template\Filters;
use Nette\Bridges\ApplicationLatte\ILatteFactory;
use Nette\DI\CompilerExtension;

class Extension extends CompilerExtension
{

	/** @var mixed[] */
	private $defaults = [
		'service' => null,
		'aliases' => [],
	];

	public function loadConfiguration()
	{
		$this->validateConfig($this->defaults);

		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('service'))
			->setFactory($this->config['service']);

		$filtersService = $builder->addDefinition($this->prefix('filters'))
			->setFactory(Filters::class, [$this->config['aliases']]);

		$builder->getDefinitionByType(ILatteFactory::class)
			->getResultDefinition()
			->addSetup('addFilter', ['image', [$filtersService, 'processImage']]);
	}

}
