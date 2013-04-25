<?php

namespace App\Model\DTO\CategoriesList;

class LastPost extends \Nette\Object
{
	private $id;

	private $posted;

	private $author;

	public function __construct($id, \DateTime $posted, $author)
	{
		$this->id = $id;
		$this->posted = $posted;
		$this->author = $author;
	}

	public function getId()
	{
		return $this->id;
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
