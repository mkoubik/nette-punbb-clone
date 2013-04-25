<?php

namespace App\Model;

class CategoriesRepository
{
	private $connection;

	private $mapper;

	public function __construct(\Nette\Database\Connection $connection, Mapping\CategoriesMapper $mapper)
	{
		$this->connection = $connection;
		$this->mapper = $mapper;
	}

	public function getAll()
	{
		$categories = $this->connection->table('pun_categories')
			->order('disp_position')
			->fetchAll();
		return $this->mapper->mapCategoriesList($categories);
	}
}
