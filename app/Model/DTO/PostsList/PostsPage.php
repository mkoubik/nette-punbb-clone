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

	public function getNumber()
	{
		return $this->number;
	}

	public function getFrom()
	{
		return $this->from;
	}

	public function getTo()
	{
		return $this->to;
	}

	public function getTotal()
	{
		return $this->total;
	}

	public function getPosts()
	{
		return $this->posts;
	}

	public function getPaginator()
	{
		return $this->paginator;
	}
}
