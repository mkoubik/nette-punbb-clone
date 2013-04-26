<?php

namespace App\Model\Mapping;

use App\Model\DTO\CategoriesList as ListDTO;
use App\Model\DTO;

class CategoriesMapper implements ICategoriesMapper
{
	/** @inheritDoc */
	public function mapCategoriesList($categories)
	{
		$mapper = $this;
		return array_map(function($row) use ($mapper) {
			$forums = $row->related($mapper::TABLE_FORUMS, $mapper::ROW_FORUMS_CATEGORY_ID)
				->order($mapper::ROW_FORUMS_POSITION);
			$forums = array_map(function ($row) use ($mapper) {
				$lastPost = NULL;
				if ($row[$mapper::ROW_FORUMS_LAST_POST_ID] !== NULL) {
					$lastPost = new DTO\LastPost(
						$row[$mapper::ROW_FORUMS_LAST_POST_ID],
						new \DateTime('@' . $row->last_post),
						$row[$mapper::ROW_FORUMS_LAST_POST_AUTHOR]
					);
				}
				return new ListDTO\Forum(
					$row[$mapper::ROW_FORUMS_ID],
					$row[$mapper::ROW_FORUMS_NAME],
					$row[$mapper::ROW_FORUMS_DESCRIPTION],
					$row[$mapper::ROW_FORUMS_TOPICS_COUNT],
					$row[$mapper::ROW_FORUMS_POSTS_COUNT],
					$lastPost
				);
			}, iterator_to_array($forums));
			return new ListDTO\Category($row[$mapper::ROW_CATEGORIES_NAME], $forums);
		}, $categories);
	}
}
