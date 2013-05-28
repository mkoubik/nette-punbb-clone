<?php

namespace App\Model\DTO\PostsList;

use Nette\Utils\Paginator;

/**
 * @method int getNumber()
 * @method int getFrom()
 * @method int getTo()
 * @method int getTotal()
 * @method \App\Model\DTO\PostsList\Post[] getPosts()
 * @method \Nette\Utils\Paginator getPaginator()
 */
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
}
