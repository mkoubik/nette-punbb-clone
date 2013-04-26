<?php

namespace App\Model\DTO\PostsList;

class Post extends \Nette\Object
{
	private $id;

	private $number;

	private $message;

	private $posted;

	private $author;

	private $edited = NULL;

	private $editedBy = NULL;

	/**
	 * @param int $id
	 * @param int $number
	 * @param string $message
	 * @param \DateTime $posted
	 * @param \App\Model\DTO\PostsList\Author $author
	 * @param \DateTime $edited
	 * @param string $editedBy editor's name
	 */
	public function __construct($id, $number, $message, \DateTime $posted, Author $author, \DateTime $edited = NULL, $editedBy = NULL)
	{
		$this->id = $id;
		$this->number = $number;
		$this->message = $message;
		$this->posted = $posted;
		$this->author = $author;
		$this->edited = $edited;
		$this->editedBy = $editedBy;
	}

	/** @return int */
	public function getId()
	{
		return $this->id;
	}

	/** @return int */
	public function getNumber()
	{
		return $this->number;
	}

	/** @return string */
	public function getMessage()
	{
		return $this->message;
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

	/** @return \DateTime */
	public function getEdited()
	{
		return $this->edited;
	}

	/** @return string */
	public function getEditedBy()
	{
		return $this->editedBy;
	}
}
