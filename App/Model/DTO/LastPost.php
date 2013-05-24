<?php

namespace App\Model\DTO;

class LastPost extends \Nette\Object
{
	private $id;

	private $posted;

	private $author;

	/**
	 * @param int $id
	 * @param \DateTime $posted
	 * @param string $author author's name
	 */
	public function __construct($id, \DateTime $posted, $author)
	{
		$this->id = $id;
		$this->posted = $posted;
		$this->author = $author;
	}

	/** @return int */
	public function getId()
	{
		return $this->id;
	}

	/** @return \DateTime */
	public function getPosted()
	{
		return $this->posted;
	}

	/** @return string */
	public function getAuthor()
	{
		return $this->author;
	}
}
