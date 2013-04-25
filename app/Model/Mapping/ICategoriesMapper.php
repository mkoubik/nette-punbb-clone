<?php

namespace App\Model\Mapping;

interface ICategoriesMapper
{
	const TABLE_CATEGORIES = 'pun_categories';
	const ROW_CATEGORIES_NAME = 'cat_name';

	const TABLE_FORUMS = 'pun_forums';
	const ROW_FORUMS_ID = 'id';
	const ROW_FORUMS_CATEGORY_ID = 'cat_id';
	const ROW_FORUMS_NAME = 'forum_name';
	const ROW_FORUMS_DESCRIPTION = 'forum_desc';
	const ROW_FORUMS_TOPICS_COUNT = 'num_topics';
	const ROW_FORUMS_POSTS_COUNT = 'num_posts';
	const ROW_FORUMS_LAST_POST_ID = 'last_post_id';
	const ROW_FORUMS_LAST_POST_POSTED = 'last_post';
	const ROW_FORUMS_LAST_POST_AUTHOR = 'last_poster';

	public function mapCategoriesList($data);
}
