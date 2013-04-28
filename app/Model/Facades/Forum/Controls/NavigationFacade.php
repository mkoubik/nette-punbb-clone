<?php

namespace App\Model\Facades\Forum\Controls;

use App\Model;

class NavigationFacade
{
	/** @var \App\Model\ConfigRepository */
	private $configRepository;

	/** @var \App\Model\ForumsRepository */
	private $forumsRepository;

	/** @var \App\Model\TopicsRepository */
	private $topicsRepository;

	/**
	 * [__construct description]
	 * @param \App\Model\ConfigRepository $configRepository
	 * @param \App\Model\ForumsRepository $forumsRepository
	 * @param \App\Model\topicsRepository $topicsRepository
	 */
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

	/**
	 * [getLocation description]
	 * @param  int|NULL $forumId
	 * @param  int|NULL $topicId
	 * @return \App\Model\DTO\Location
	 */
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
