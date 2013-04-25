<?php

namespace App\Model\Mapping;

use App\Model\DTO\CategoriesList as ListDTO;

class CategoriesMapper implements ICategoriesMapper
{
	/** @inheritDoc */
	public function mapCategoriesList($categories)
	{
		return array_map(function($row) {
			$forums = $row->related(self::TABLE_FORUMS, self::ROW_FORUMS_CATEGORY_ID)
				->order(self::ROW_FORUMS_POSITION);
			$forums = array_map(function ($row) {
				$lastPost = NULL;
				if ($row[self::ROW_FORUMS_LAST_POST_ID] !== NULL) {
					$lastPost = new ListDTO\LastPost(
						$row[self::ROW_FORUMS_LAST_POST_ID],
						new \DateTime('@' . $row->last_post),
						$row[self::ROW_FORUMS_LAST_POST_AUTHOR]
					);
				}
				return new ListDTO\Forum(
					$row[self::ROW_FORUMS_ID],
					$row[self::ROW_FORUMS_NAME],
					$row[self::ROW_FORUMS_DESCRIPTION],
					$row[self::ROW_FORUMS_TOPICS_COUNT],
					$row[self::ROW_FORUMS_POSTS_COUNT],
					$lastPost
				);
			}, iterator_to_array($forums));
			return new ListDTO\Category($row[self::ROW_CATEGORIES_NAME], $forums);
		}, $categories);
	}
}
