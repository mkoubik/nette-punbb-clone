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

	public function __construct($id, $name, $author, $repliesCount, $viewsCount, LastPost $lastPost = NULL)
	{
		$this->id = $id;
		$this->name = $name;
		$this->author = $author;
		$this->repliesCount = $repliesCount;
		$this->viewsCount = $viewsCount;
		$this->lastPost = $lastPost;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getAuthor()
	{
		return $this->author;
	}

	public function getRepliesCount()
	{
		return $this->repliesCount;
	}

	public function getViewsCount()
	{
		return $this->viewsCount;
	}

	public function getLastPost()
	{
		return $this->lastPost;
	}
}
