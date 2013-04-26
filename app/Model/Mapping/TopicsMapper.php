<?php

namespace App\Model\Mapping;

use App\Model\DTO\TopicsList as ListDTO;
use App\Model\DTO;

class TopicsMapper implements ITopicsMapper
{
	/** @inheritDoc */
	public function mapTopicsList($topics)
	{
		$mapper = $this;
		return array_map(function ($row) use ($mapper) {
			$lastPost = new DTO\LastPost(
				$row[$mapper::ROW_TOPICS_LAST_POST_ID],
				new \DateTime('@' . $row[$mapper::ROW_TOPICS_LAST_POST_POSTED]),
				$row[$mapper::ROW_TOPICS_LAST_POST_AUTHOR]
			);
			return new ListDTO\Topic(
				$row[$mapper::ROW_TOPICS_ID],
				$row[$mapper::ROW_TOPICS_NAME],
				$row[$mapper::ROW_TOPICS_AUTHOR],
				$row[$mapper::ROW_TOPICS_REPLIES_COUNT],
				$row[$mapper::ROW_TOPICS_VIEWS_COUNT],
				$lastPost
			);
		}, $topics);
	}

	/** @inheritDoc */
	public function mapNameAndForumId($topic)
	{
		return array(
			'name' => $topic[self::ROW_TOPICS_NAME],
			'forumId' => $topic[self::ROW_TOPICS_FORUM_ID],
		);
	}
}
