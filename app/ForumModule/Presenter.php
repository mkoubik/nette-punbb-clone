<?php

namespace App\ForumModule;

abstract class Presenter extends \Nette\Application\UI\Presenter
{
	private $navigationFactory;

	public function injectFactories(Controls\INavigationFactory $navigation)
	{
		$this->navigationFactory = $navigation;
	}

	protected function createComponentNavigation($name)
	{
		return $this->navigationFactory->create();
	}
}
