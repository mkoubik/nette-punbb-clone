<?php

namespace App\Model;

class CategoriesRepository
{
	private $connection;

	private $mapper;

	/**
	 * @param \Nette\Database\Connection $connection
	 * @param \App\Model\Mapping\ICategoriesMapper $mapper
	 */
	public function __construct(\Nette\Database\Connection $connection, Mapping\ICategoriesMapper $mapper)
	{
		$this->connection = $connection;
		$this->mapper = $mapper;
	}

	/**
	 * Get list of categories sorted by position.
	 * @return \App\Model\DTO\CategoriesList\Category[]
	 */
	public function getAll()
	{
		$mapper = $this->mapper;
		$categories = $this->connection->table($mapper::TABLE_CATEGORIES)
			->order($mapper::ROW_CATEGORIES_POSITION)
			->fetchAll();
		return $mapper->mapCategoriesList($categories);
	}
}
