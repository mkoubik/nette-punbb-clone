<?php

namespace App\Model;

use Nette\Utils\Paginator;

class PostsRepository
{
	const POSTS_PER_PAGE = 25;

	private $connection;

	private $mapper;

	private $paginator;

	public function __construct(\Nette\Database\Connection $connection, Mapping\IPostsMapper $mapper)
	{
		$this->connection = $connection;
		$this->mapper = $mapper;
		$this->paginator = new Paginator();
		$this->paginator->itemsPerPage = self::POSTS_PER_PAGE;
	}

	/**
	 * @param  int $id topic id
	 * @param  int $page page number
	 * @return \App\Model\DTO\PostsList\PostsPage
	 */
	public function getPageByTopicId($id, $page)
	{
		$mapper = $this->mapper;
		$total = $this->prepareByTopicId($id)->count('*');
		if ($total == 0) {
			// TODO exception
		}
		$this->paginator->itemCount = $total;
		$this->paginator->page = $page;
		$postsData = $this->prepareByTopicId($id)
			->limit($this->paginator->itemsPerPage, $this->paginator->offset)
			->fetchAll();
		$from = $this->paginator->offset + 1;
		$posts = $mapper->mapPostsList($postsData, $from);
		$to = $this->paginator->offset + count($posts);
		return new DTO\PostsList\PostsPage($page, $from, $to, $total, $posts);
	}

	private function prepareByTopicId($id)
	{
		$mapper = $this->mapper;
		return $this->connection->table($mapper::TABLE_POSTS)
			->where($mapper::ROW_POSTS_TOPIC_ID, $id)
			->order($mapper::ROW_POSTS_POSTED);
	}
}
