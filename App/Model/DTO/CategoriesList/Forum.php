<?php

namespace App\Model\DTO\CategoriesList;

use App\Model\DTO\LastPost;

/**
 * @method int getId()
 * @method string getName()
 * @method string getDescription()
 * @method int getTopicsCount()
 * @method int getPostsCount()
 * @method \App\Model\DTO\LastPost getLastPost()
 */
class Forum extends \Nette\Object
{
	private $id;

	private $name;

	private $description;

	private $topicsCount;

	private $postsCount;

	private $lastPost = NULL;

	/**
	 * @param int $id
	 * @param string $name
	 * @param string $description
	 * @param int $topicsCount
	 * @param int $postsCount
	 * @param \App\Model\DTO\LastPost $lastPost
	 */
	public function __construct($id, $name, $description, $topicsCount, $postsCount, LastPost $lastPost = NULL)
	{
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->topicsCount = $topicsCount;
		$this->postsCount = $postsCount;
		$this->lastPost = $lastPost;
	}
}
