<?php

namespace App\Model\DTO\PostsList;

use Nette\Utils\Paginator;

class PostsPage extends \Nette\Object
{
	private $number;

	private $from;

	private $to;

	private $total;

	private $posts;

	private $paginator;

	/**
	 * @param int $number
	 * @param int $from
	 * @param int $to
	 * @param int $total
	 * @param \App\Model\DTO\PostsList\Post[] $posts
	 * @param \Nette\Utils\Paginator $paginator
	 */
	public function __construct($number, $from, $to, $total, array $posts, Paginator $paginator)
	{
		$this->number = $number;
		$this->from = $from;
		$this->to = $to;
		$this->total = $total;
		$this->posts = array_filter($posts, function ($post) {
			return $post instanceof Post;
		});
		$this->paginator = $paginator;
	}

	/** @return int */
	public function getNumber()
	{
		return $this->number;
	}

	/** @return int */
	public function getFrom()
	{
		return $this->from;
	}

	/** @return int */
	public function getTo()
	{
		return $this->to;
	}

	/** @return int */
	public function getTotal()
	{
		return $this->total;
	}

	/** @return \App\Model\DTO\PostsList\Post[] */
	public function getPosts()
	{
		return $this->posts;
	}

	/** @return \Nette\Utils\Paginator */
	public function getPaginator()
	{
		return $this->paginator;
	}
}
