<?php

namespace App\Model\DTO\PostsList;

class Author extends \Nette\Object
{
	private $id;

	private $name;

	private $title;

	private $online;

	private $registered;

	private $postsCount;

	public function __construct($id, $name, $title, $online, \DateTime $registered, $postsCount)
	{
		$this->id = $id;
		$this->name = $name;
		$this->title = $title;
		$this->online = $online;
		$this->registered = $registered;
		$this->postsCount = $postsCount;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function isOnline()
	{
		return $this->online;
	}

	public function getRegistered()
	{
		return $this->registered;
	}

	public function getPostsCount()
	{
		return $this->postsCount;
	}
}
