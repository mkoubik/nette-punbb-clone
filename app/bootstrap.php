<?php

// Load Nette Framework or autoloader generated by Composer
require __DIR__ . '/../libs/autoload.php';


$configurator = new Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
//$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/../log');

function bardump($var, $title = NULL)
{
	\Nette\Diagnostics\Debugger::barDump($var, $title);
}

// Specify folder for cache
$configurator->setTempDirectory(__DIR__ . '/../temp');

// Enable RobotLoader - this will load all classes automatically
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->addDirectory(__DIR__ . '/../libs')
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/config/config.neon', FALSE);
if (file_exists(__DIR__ . '/config/config.local.neon')) {
	$configurator->addConfig(__DIR__ . '/config/config.local.neon', FALSE);
}
if (isset($_SERVER['DB!_HOST'])) {
	$configurator->addConfig(__DIR__ . '/config/pagodabox.php', FALSE);
}
$container = $configurator->createContainer();

return $container;
