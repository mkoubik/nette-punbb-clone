<?php

namespace App\Model\Mapping;

use App\Model\DTO\CategoriesList as ListDTO;

class CategoriesMapper
{
	public function mapCategoriesList($categories)
	{
		return array_map(function($row) {
			$forums = $row->related('pun_forums', 'cat_id');
			$forums = array_map(function ($row) {
				$lastPost = NULL;
				if ($row->last_post_id !== NULL) {
					$lastPost = new ListDTO\LastPost($row->last_post_id, new \DateTime('@' . $row->last_post), $row->last_poster);
				}
				return new ListDTO\Forum($row->id, $row->forum_name, $row->forum_desc, $row->num_topics, $row->num_posts, $lastPost);
			}, iterator_to_array($forums));
			return new ListDTO\Category($row->cat_name, $forums);
		}, $categories);
	}
}
