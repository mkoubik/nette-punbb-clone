<?php

namespace App\Model;

use Nette\Utils\Paginator;

class PostsRepository
{
	const POSTS_PER_PAGE = 25;

	private $selectionFactory;

	private $mapper;

	/**
	 * [__construct description]
	 * @param \Nette\Database\SelectionFactory $selectionFactory
	 * @param \App\Model\Mapping\IPostsMapper $mapper
	 */
	public function __construct(\Nette\Database\SelectionFactory $selectionFactory, Mapping\IPostsMapper $mapper)
	{
		$this->selectionFactory = $selectionFactory;
		$this->mapper = $mapper;
	}

	/**
	 * @param  int $id topic id
	 * @param  int $page page number
	 * @return \App\Model\DTO\PostsList\PostsPage
	 * @throws \App\Model\Exceptions\NotFoundException If topic or page does not exist
	 */
	public function getPageByTopicId($id, $page)
	{
		$mapper = $this->mapper;
		$total = $this->prepareByTopicId($id)->count('*');
		if ($total == 0) {
			throw new \App\Model\Exceptions\NotFoundException();
		}
		$paginator = new Paginator();
		$paginator->itemsPerPage = self::POSTS_PER_PAGE;
		$paginator->itemCount = $total;
		$paginator->page = $page;
		if ($paginator->page !== $page) {
			throw new \App\Model\Exceptions\NotFoundException();
		}
		$postsData = $this->prepareByTopicId($id)
			->limit($paginator->itemsPerPage, $paginator->offset)
			->fetchAll();
		$from = $paginator->offset + 1;
		$posts = $mapper->mapPostsList($postsData, $from);
		$to = $paginator->offset + count($posts);
		return new DTO\PostsList\PostsPage($page, $from, $to, $total, $posts, $paginator);
	}

	private function prepareByTopicId($id)
	{
		$mapper = $this->mapper;
		return $this->selectionFactory->table($mapper::TABLE_POSTS)
			->where($mapper::ROW_POSTS_TOPIC_ID, $id)
			->order($mapper::ROW_POSTS_POSTED);
	}
}
