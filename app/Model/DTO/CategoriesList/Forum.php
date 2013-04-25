<?php

namespace App\Model\DTO\CategoriesList;

use App\Model\DTO\LastPost;

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

	/** @return string */
	public function getDescription()
	{
		return $this->description;
	}

	/** @return int */
	public function getTopicsCount()
	{
		return $this->topicsCount;
	}

	/** @return int */
	public function getPostsCount()
	{
		return $this->postsCount;
	}

	/** @return LastPost|NULL */
	public function getLastPost()
	{
		return $this->lastPost;
	}
}
