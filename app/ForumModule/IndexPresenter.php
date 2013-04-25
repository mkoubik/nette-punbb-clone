<?php

namespace App\ForumModule;

use Nette\Application\UI\Presenter;

final class IndexPresenter extends Presenter
{
	/**
	 * @inject
	 * @var \App\Model\CategoriesRepository
	 */
	public $categories;

	public function renderDefault()
	{
		$this->template->categories = $this->categories->getAll();
	}
}
