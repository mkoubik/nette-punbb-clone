<?php

namespace App\Model\DTO\TopicsList;

use App\Model\DTO\LastPost;

/**
 * @method int getId()
 * @method string getName()
 * @method string getAuthor()
 * @method int getRepliesCount()
 * @method int getViewsCount()
 * @method \App\Model\DTO\LastPost getLastPost()
 */
class Topic extends \Nette\Object
{
	private $id;

	private $name;

	private $author;

	private $repliesCount;

	private $viewsCount;

	private $lastPost = NULL;

	/**
	 * @param int $id
	 * @param string $name
	 * @param string $author author's name
	 * @param int $repliesCount
	 * @param int $viewsCount
	 * @param \App\Model\DTO\LastPost $lastPost
	 */
	public function __construct($id, $name, $author, $repliesCount, $viewsCount, LastPost $lastPost = NULL)
	{
		$this->id = $id;
		$this->name = $name;
		$this->author = $author;
		$this->repliesCount = $repliesCount;
		$this->viewsCount = $viewsCount;
		$this->lastPost = $lastPost;
	}
}
