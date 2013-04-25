<?php

namespace App\Model\DTO\PostsList;

class PostsPage extends \Nette\Object
{
	private $number;

	private $from;

	private $to;

	private $total;

	private $posts;

	public function __construct($number, $from, $to, $total, array $posts)
	{
		$this->number = $number;
		$this->from = $from;
		$this->to = $to;
		$this->total = $total;
		$this->posts = array_filter($posts, function ($post) {
			return $post instanceof Post;
		});
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
}
