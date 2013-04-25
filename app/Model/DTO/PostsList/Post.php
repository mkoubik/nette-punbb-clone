<?php

namespace App\Model\DTO\PostsList;

// TODO: edited
class Post extends \Nette\Object
{
	private $id;

	private $number;

	private $message;

	private $posted;

	private $author;

	public function __construct($id, $number, $message, \DateTime $posted, Author $author)
	{
		$this->id = $id;
		$this->number = $number;
		$this->message = $message;
		$this->posted = $posted;
		$this->author = $author;
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
}
