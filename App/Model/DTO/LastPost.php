<?php

namespace App\Model\DTO;

/**
 * @method int getId()
 * @method \DateTime getPosted()
 * @method string getAuthor()
 */
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
}
