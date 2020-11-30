<?php declare(strict_types = 1);

namespace Adbros\RemoteImageProcessor\Services;

interface IService
{

	/**
	 * @return string[]
	 */
	public function getAliases(): array;

	/**
	 * @param string[] $aliases
	 */
	public function setAliases(array $aliases): void;

	public function processImage(string $imageUrl, ?string $alias = null): string;

}
