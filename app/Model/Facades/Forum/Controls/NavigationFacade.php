<?php

namespace App\Model\Facades\Forum\Controls;

use App\Model;

class NavigationFacade
{
	private $configRepository;

	private $forumsRepository;

	private $topicsRepository;

	public function __construct(
		Model\ConfigRepository $configRepository,
		Model\ForumsRepository $forumsRepository,
		Model\topicsRepository $topicsRepository
	)
	{
		$this->configRepository = $configRepository;
		$this->forumsRepository = $forumsRepository;
		$this->topicsRepository = $topicsRepository;
	}

	public function getLocation($forumId = NULL, $topicId = NULL)
	{
		$board = $this->configRepository->getValue(Model\ConfigRepository::CONFIG_BOARD_TITLE);
		$forumName = $topicName = NULL;
		
		if ($topicId !== NULL) {
			try {
				$data = $this->topicsRepository->getNameAndForumIdById($topicId);
				$topicName = $data['name'];
				$forumId = $data['forumId'];
			} catch (\App\Model\Exceptions\NotFoundException $e) {
				$topicId = NULL;
				$forumId = NULL;
			}
		}

		if ($forumId !== NULL) {
			try {
				$forumName = $this->forumsRepository->getNameById($forumId);
			} catch (\App\Model\Exceptions\NotFoundException $e) {
				$forumId = NULL;
			}
		}

		return new Model\DTO\Location($board, $forumId, $forumName, $topicName);
	}
}
