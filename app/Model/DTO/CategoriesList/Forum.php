<?php

namespace App\Model\DTO\CategoriesList;

class Forum extends \Nette\Object
{
	private $id;

	private $name;

	private $description;

	private $topicsCount;

	private $postsCount;

	private $lastPost = NULL;

	public function __construct($id, $name, $description, $topicsCount, $postsCount, LastPost $lastPost = NULL)
	{
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->topicsCount = $topicsCount;
		$this->postsCount = $postsCount;
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

	public function getDescription()
	{
		return $this->description;
	}

	public function getTopicsCount()
	{
		return $this->topicsCount;
	}

	public function getPostsCount()
	{
		return $this->postsCount;
	}

	public function getLastPost()
	{
		return $this->lastPost;
	}
}
