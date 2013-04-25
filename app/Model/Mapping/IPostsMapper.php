<?php

namespace App\Model\Mapping;

interface IPostsMapper
{
	const GUEST_GROUP_ID = 2;

	const TABLE_POSTS = 'pun_posts';
	const ROW_POSTS_ID = 'id';
	const ROW_POSTS_TOPIC_ID = 'topic_id';
	const ROW_POSTS_AUTHOR_ID = 'poster_id';
	const ROW_POSTS_AUTHOR_NAME = 'poster';
	const ROW_POSTS_MESSAGE = 'message';
	const ROW_POSTS_POSTED = 'posted';

	const TABLE_USERS = 'pun_users';
	const ROW_USERS_REGISTERD = 'registered';
	const ROW_USERS_POSTS_COUNT = 'num_posts';
	const ROW_USERS_TITLE = 'title';
	const ROW_USERS_GROUP_ID = 'group_id';

	const TABLE_ONLINE = 'pun_online';
	const ROW_ONLINE_USER_ID = 'user_id';
	const ROW_ONLINE_IDENT = 'isent';

	const TABLE_GROUPS = 'pun_groups';
	const ROW_GROUP_USER_TITLE = 'g_user_title';

	/**
	 * @param mixed $data
	 * @param int $firstNumber number of the first post in the list
	 * @return \App\Model\DTO\PostsList\Post[]
	 */
	public function mapPostsList($data, $firstNumber);
}
