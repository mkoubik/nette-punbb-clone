<?php

namespace App\ForumModule;

use Nette\Application\UI\Presenter;
use App\Model\PostsRepository;

final class TopicPresenter extends Presenter
{
	/** @persistent */
	public $id;

	private $posts;

	public function injectRepository(PostsRepository $posts)
	{
		$this->posts = $posts;
	}

	// TODO: check if the topic exists
	public function startup()
	{
		parent::startup();
	}

	public function renderDefault($page = 1)
	{
		$this->template->page = $this->posts->getPageByTopicId($this->id, $page);
	}
}
