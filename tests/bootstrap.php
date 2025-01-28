<?php declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

use Contributte\Tester\Environment;

// Configure Nette\Tester
Environment::setupTester();

// Configure timezone
Environment::setupTimezone('Europe/Prague');

// Create folders (/tmp)
Environment::setupFolders(__DIR__);

// Fill global variables
Environment::setupGlobalVariables();

// Configure sessions save path
Environment::setupSessions(__DIR__);

// Allow global test() function
Environment::setupFunctions();
