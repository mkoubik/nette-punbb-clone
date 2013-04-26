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

	/**
	 * @param int $id
	 * @param string $name
	 * @param string $title
	 * @param bool $online
	 * @param \DateTime $registered
	 * @param int $postsCount
	 */
	public function __construct($id, $name, $title, $online, \DateTime $registered, $postsCount)
	{
		$this->id = $id;
		$this->name = $name;
		$this->title = $title;
		$this->online = $online;
		$this->registered = $registered;
		$this->postsCount = $postsCount;
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
	public function getTitle()
	{
		return $this->title;
	}

	/** @return bool */
	public function isOnline()
	{
		return $this->online;
	}

	/** @return \DateTime */
	public function getRegistered()
	{
		return $this->registered;
	}

	/** @return int */
	public function getPostsCount()
	{
		return $this->postsCount;
	}
}
