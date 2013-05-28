<?php

namespace App\Model\DTO\CategoriesList;

/**
 * @method string getName()
 * @method \App\Model\DTO\CategoriesList\Forum[] getForums()
 */
class Category extends \Nette\Object
{
	private $name;

	private $forums;

	/**
	 * @param string $name
	 * @param \App\Model\DTO\CategoriesList\Forum[] $forums
	 */
	public function __construct($name, array $forums)
	{
		$this->name = $name;

		// TODO: exception?
		$this->forums = array_filter($forums, function ($forum) {
			return $forum instanceof Forum;
		});
	}
}
