<?php

namespace App\Model\DTO\PostsList;

/**
 * @method int getId()
 * @method int getNumber()
 * @method string getMessage()
 * @method \DateTime getPosted()
 * @method \App\Model\DTO\PostsList\Author getAuthor()
 * @method \DateTime getEdited()
 * @method string getEditedBy()
 */
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
}
