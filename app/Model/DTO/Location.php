<?php

namespace App\Model\DTO;

class Location extends \Nette\Object
{
	private $boardTitle;

	private $forumId = NULL;

	private $forumName = NULL;

	private $topicName = NULL;

	public function __construct($boardTitle, $forumId = NULL, $forumName = NULL, $topicName = NULL)
	{
		$this->boardTitle = $boardTitle;
		$this->forumId = $forumId;
		$this->forumName = $forumName;
		$this->topicName = $topicName;
	}

	public function getBoardTitle()
	{
		return $this->boardTitle;
	}

	public function getForumId()
	{
		return $this->forumId;
	}

	public function getForumName()
	{
		return $this->forumName;
	}

	public function getTopicName()
	{
		return $this->topicName;
	}
}
