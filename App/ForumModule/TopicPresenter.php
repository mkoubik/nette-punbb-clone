<?php

namespace App\ForumModule;

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

	public function startup()
	{
		parent::startup();
		// TODO: check if the topic exists
		$this['navigation']->setTopicId($this->id);
	}

	public function renderDefault($page = 1)
	{
		try {
			$this->template->page = $this->posts->getPageByTopicId($this->id, $page);
		} catch (\App\Model\Exceptions\NotFoundException $e) {
			throw new \Nette\Application\BadRequestException();
		}
	}
}
