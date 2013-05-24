<?php

namespace App\Model;

class CategoriesRepository
{
	private $selectionFactory;

	private $mapper;

	/**
	 * @param \Nette\Database\SelectionFactory $selectionFactory
	 * @param \App\Model\Mapping\ICategoriesMapper $mapper
	 */
	public function __construct(\Nette\Database\SelectionFactory $selectionFactory, Mapping\ICategoriesMapper $mapper)
	{
		$this->selectionFactory = $selectionFactory;
		$this->mapper = $mapper;
	}

	/**
	 * Get list of categories sorted by position.
	 * @return \App\Model\DTO\CategoriesList\Category[]
	 */
	public function getAll()
	{
		$mapper = $this->mapper;
		$categories = $this->selectionFactory->table($mapper::TABLE_CATEGORIES)
			->order($mapper::ROW_CATEGORIES_POSITION)
			->fetchAll();
		return $mapper->mapCategoriesList($categories);
	}
}
