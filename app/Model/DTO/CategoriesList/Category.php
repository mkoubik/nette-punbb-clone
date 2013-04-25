<?php

namespace App\Model\DTO\CategoriesList;

class Category extends \Nette\Object
{
	private $name;

	private $forums;

	public function __construct($name, array $forums)
	{
		$this->name = $name;

		// TODO: exception?
		$this->forums = array_filter($forums, function ($forum) {
			return $forum instanceof Forum;
		});
	}

	public function getName()
	{
		return $this->name;
	}

	public function getForums()
	{
		return $this->forums;
	}
}
