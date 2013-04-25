<?php

namespace App\ForumModule;

use Nette\Application\UI\Presenter;
use App\Model\CategoriesRepository;

final class IndexPresenter extends Presenter
{
	/** @var \App\Model\CategoriesRepository */
	private $categories;

	public function injectRepository(CategoriesRepository $categories)
	{
		$this->categories = $categories;
	}

	public function renderDefault()
	{
		$this->template->categories = $this->categories->getAll();
	}
}
