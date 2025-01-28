<?php declare(strict_types = 1);

namespace Adbros\RemoteImageProcessor\Services;

abstract class BaseService
{

	/** @var string[] */
	protected array $aliases;

	/**
	 * @return string[]
	 */
	public function getAliases(): array
	{
		return $this->aliases;
	}

	/**
	 * @param string[] $aliases
	 */
	public function setAliases(array $aliases): void
	{
		$this->aliases = $aliases;
	}

}
