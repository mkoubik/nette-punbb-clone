<?php

namespace App\Model\DTO\TopicsList;

use App\Model\DTO\LastPost;

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

	/** @return int */
	public function getId()
	{
		return $this->id;
	}

	/** @return string */
	public function getName()
	{
		return $this->name;
	}

	/** @return sring */
	public function getAuthor()
	{
		return $this->author;
	}

	/** @return int */
	public function getRepliesCount()
	{
		return $this->repliesCount;
	}

	/** @return int */
	public function getViewsCount()
	{
		return $this->viewsCount;
	}

	/** @return \App\Model\DTO\LastPost */
	public function getLastPost()
	{
		return $this->lastPost;
	}
}
