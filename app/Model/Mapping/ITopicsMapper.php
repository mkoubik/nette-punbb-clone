<?php

namespace App\Model\Mapping;

interface ITopicsMapper
{
	const TABLE_TOPICS = 'pun_topics';
	const ROW_TOPICS_ID = 'id';
	const ROW_TOPICS_FORUM_ID = 'forum_id';
	const ROW_TOPICS_NAME = 'subject';
	const ROW_TOPICS_AUTHOR = 'poster';
	const ROW_TOPICS_REPLIES_COUNT = 'num_replies';
	const ROW_TOPICS_VIEWS_COUNT = 'num_views';
	const ROW_TOPICS_LAST_POST_ID = 'last_post_id';
	const ROW_TOPICS_LAST_POST_POSTED = 'last_post';
	const ROW_TOPICS_LAST_POST_AUTHOR = 'last_poster';

	/**
	 * @param  mixed $data
	 * @return \App\Model\DTO\TopicsList\Topic[]
	 */
	public function mapTopicsList($data);
}
