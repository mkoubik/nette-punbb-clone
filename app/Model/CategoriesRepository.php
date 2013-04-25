<?php

namespace App\Model;

class CategoriesRepository
{
	private $connection;

	public function __construct(\Nette\Database\Connection $connection)
	{
		$this->connection = $connection;
	}

	public function getAll()
	{
		$categories = $this->connection->table('pun_categories')
			->order('disp_position')
			->fetchAll();
		return array_map(function($row) {
			$forums = $row->related('pun_forums', 'cat_id');
			$forums = array_map(function ($row) {
				$lastPost = NULL;
				if ($row->last_post_id !== NULL) {
					$lastPost = new DTO\LastPost($row->last_post_id, new \DateTime('@' . $row->last_post), $row->last_poster);
				}
				return new DTO\Forum($row->id, $row->forum_name, $row->forum_desc, $row->num_topics, $row->num_posts, $lastPost);
			}, iterator_to_array($forums));
			return new DTO\Category($row->cat_name, $forums);
		}, $categories);
	}
}
