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

	public function getId()
	{
		return $this->id;
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function getMessage()
	{
		return $this->message;
	}

	public function getPosted()
	{
		return $this->posted;
	}

	public function getAuthor()
	{
		return $this->author;
	}

	public function getEdited()
	{
		return $this->edited;
	}

	public function getEditedBy()
	{
		return $this->editedBy;
	}
}
