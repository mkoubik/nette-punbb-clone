<?php

namespace App\Model\DTO;

class Location extends \Nette\Object
{
	private $boardTitle;

	private $forumId = NULL;

	private $forumName = NULL;

	private $topicName = NULL;

	/**
	 * @param string $boardTitle
	 * @param int|NULL $forumId
	 * @param string|NULL $forumName
	 * @param string|NULL $topicName
	 */
	public function __construct($boardTitle, $forumId = NULL, $forumName = NULL, $topicName = NULL)
	{
		$this->boardTitle = $boardTitle;
		$this->forumId = $forumId;
		$this->forumName = $forumName;
		$this->topicName = $topicName;
	}

	/** @return string */
	public function getBoardTitle()
	{
		return $this->boardTitle;
	}

	/** @return int|NULL */
	public function getForumId()
	{
		return $this->forumId;
	}

	/** @return string|NULL */
	public function getForumName()
	{
		return $this->forumName;
	}

	/** @return string|NULL */
	public function getTopicName()
	{
		return $this->topicName;
	}
}
