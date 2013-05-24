<?php

require __DIR__ . '/../vendor/autoload.php';

if (!class_exists('Tester\Assert')) {
	echo "Install Nette Tester using `composer update --dev`\n";
	exit(1);
}

function id($val) {
	return $val;
}

Tester\Helpers::setup();
class_alias('Tester\Assert', 'Assert');
define('TEMP_DIR', __DIR__ . '/tmp/' . getmygid());
Tester\Helpers::purge(TEMP_DIR);

$configurator = new Nette\Config\Configurator;
$configurator->setDebugMode(FALSE);
$configurator->setTempDirectory(TEMP_DIR);
$configurator->createRobotLoader()
	->addDirectory(__DIR__ . '/../App')
	->register();

$configurator->addConfig(__DIR__ . '/../App/config/config.neon', FALSE);
$configurator->addConfig(__DIR__ . '/../App/config/config.local.neon', FALSE);
return $configurator->createContainer();
