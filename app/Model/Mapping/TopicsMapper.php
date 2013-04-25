<?php

namespace App\Model\Mapping;

use App\Model\DTO\TopicsList as ListDTO;
use App\Model\DTO;

class TopicsMapper implements ITopicsMapper
{
	/** @inheritDoc */
	public function mapTopicsList($topics)
	{
		return array_map(function ($row) {
			$lastPost = new DTO\LastPost(
				$row[self::ROW_TOPICS_LAST_POST_ID],
				new \DateTime('@' . $row[self::ROW_TOPICS_LAST_POST_POSTED]),
				$row[self::ROW_TOPICS_LAST_POST_AUTHOR]				
			);
			return new ListDTO\Topic(
				$row[self::ROW_TOPICS_ID],
				$row[self::ROW_TOPICS_NAME],
				$row[self::ROW_TOPICS_AUTHOR],
				$row[self::ROW_TOPICS_REPLIES_COUNT],
				$row[self::ROW_TOPICS_VIEWS_COUNT],
				$lastPost
			);
		}, $topics);
	}
}
