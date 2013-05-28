<?php

namespace App\Model\DTO;

/**
 * @method string getBoardTitle()
 * @method int|NULL getForumId()
 * @method string|NULL getForumName()
 * @method string|NULL getTopicName()
 */
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
}
