<?php

$container = require __DIR__ . '/../../../../../bootstrap.php';

$mockista = new \Mockista\Registry();

$configRepository = $mockista->create('App\Model\ConfigRepository');
$configRepository->expects('getValue')->once()->with('o_board_title')->andReturn('Title');

$forumsRepository = $mockista->create('App\Model\ForumsRepository');
$forumsRepository->expects('getNameById')->once()->with(123)->andReturn('Forum name');

$topicsRepository = $mockista->create('App\Model\TopicsRepository');

$facade = new \App\Model\Facades\Forum\Controls\NavigationFacade($configRepository, $forumsRepository, $topicsRepository);
$location = $facade->getLocation(123);

Assert::equal('Title', $location->getBoardTitle());
Assert::equal(123, $location->getForumId());
Assert::equal('Forum name', $location->getForumName());
Assert::equal(NULL, $location->getTopicName());

$mockista->assertExpectations();
