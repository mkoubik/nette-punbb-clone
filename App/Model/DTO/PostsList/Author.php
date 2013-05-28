<?php

namespace App\Model\DTO\PostsList;

/**
 * @method int getId()
 * @method string getName()
 * @method string getTitle()
 * @method bool getOnline()
 * @method \DateTime getRegistered()
 * @method int getPostsCount()
 */
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
}
