<?php

$container = require __DIR__ . '/../../../../../bootstrap.php';

$mockista = new \Mockista\Registry();

$configRepository = $mockista->create('App\Model\ConfigRepository');
$configRepository->expects('getValue')->once()->with('o_board_title')->andReturn('Title');

$forumsRepository = $mockista->create('App\Model\ForumsRepository');
$forumsRepository->expects('getNameById')->once()->with(123)->andReturn('Forum name');

$topicsRepository = $mockista->create('App\Model\TopicsRepository');
$topicsRepository->expects('getNameAndForumIdById')->once()->with(456)
	->andReturn(array('name' => 'Topic name', 'forumId' => 123));

$facade = new \App\Model\Facades\Forum\Controls\NavigationFacade($configRepository, $forumsRepository, $topicsRepository);
$location = $facade->getLocation(NULL, 456);

Assert::equal('Title', $location->getBoardTitle());
Assert::equal(123, $location->getForumId());
Assert::equal('Forum name', $location->getForumName());
Assert::equal('Topic name', $location->getTopicName());

$mockista->assertExpectations();
