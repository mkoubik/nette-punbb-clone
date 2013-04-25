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
		$categories = $this->connection->table('pun_categories')
			->order('disp_position')
			->fetchAll();
		return $this->mapper->mapCategoriesList($categories);
	}
}
