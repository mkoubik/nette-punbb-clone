<?php

$container = require __DIR__ . '/../../../../../bootstrap.php';

$mockista = new \Mockista\Registry();

$configRepository = $mockista->create('App\Model\ConfigRepository');
$configRepository->expects('getValue')->once()->with('o_board_title')->andReturn('Title');

$forumsRepository = $mockista->create('App\Model\ForumsRepository');
$topicsRepository = $mockista->create('App\Model\TopicsRepository');

$facade = new \App\Model\Facades\Forum\Controls\NavigationFacade($configRepository, $forumsRepository, $topicsRepository);
$location = $facade->getLocation();

Assert::equal('Title', $location->getBoardTitle());
Assert::equal(NULL, $location->getForumId());
Assert::equal(NULL, $location->getForumName());
Assert::equal(NULL, $location->getTopicName());

$mockista->assertExpectations();
