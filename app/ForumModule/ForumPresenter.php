<?php

namespace App\ForumModule;

use App\Model\TopicsRepository;

final class ForumPresenter extends Presenter
{
	/** @var \App\Model\TopicsRepository */
	private $topics;

	public function injectRepository(TopicsRepository $topics)
	{
		$this->topics = $topics;
	}

	public function renderDefault($id)
	{
		$this->template->topics = $this->topics->getByForumId($id);
		$this['navigation']->setForumId($id);
	}
}
