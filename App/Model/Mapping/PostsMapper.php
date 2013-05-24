<?php

namespace App\Model\Mapping;
use App\Model\DTO\PostsList as ListDTO;

class PostsMapper implements IPostsMapper
{
	const GUEST = 'Guest';
	const MEMBER = 'Member';

	/** @inheritDoc */
	public function mapPostsList($posts, $number)
	{
		$mapper = $this;
		return array_map(function ($row) use ($mapper, &$number) {
			$author = $row->ref($mapper::TABLE_USERS, $mapper::ROW_POSTS_AUTHOR_ID);
			$online = $author->related($mapper::TABLE_ONLINE, $mapper::ROW_ONLINE_USER_ID)->count('user_id') > 0;
			$author = new ListDTO\Author(
				$row[$mapper::ROW_POSTS_AUTHOR_ID],
				$row[$mapper::ROW_POSTS_AUTHOR_NAME],
				$mapper->getTitle($author),
				$online,
				new \DateTime('@' . $author[$mapper::ROW_USERS_REGISTERD]),
				$author[$mapper::ROW_USERS_POSTS_COUNT]
			);

			$edited = NULL;
			$editedBy = NULL;
			if ($row[$mapper::ROW_POSTS_EDITED]) {
				$edited = new \DateTime('@' . $row[$mapper::ROW_POSTS_EDITED]);
				$editedBy = $row[$mapper::ROW_POSTS_EDITED_BY];
			}

			$post = new ListDTO\Post(
				$row[$mapper::ROW_POSTS_ID],
				$number,
				$row[$mapper::ROW_POSTS_MESSAGE],
				new \DateTime('@' . $row[$mapper::ROW_POSTS_POSTED]),
				$author,
				$edited,
				$editedBy
			);
			$number++;
			return $post;
		}, $posts);
	}

	public function getTitle($user)
	{
		if ($user[self::ROW_USERS_TITLE]) {
			return $user[self::ROW_USERS_TITLE];
		}
		// TODO if (banned) return 'Banned';
		$group = $user->ref(self::TABLE_GROUPS, self::ROW_USERS_GROUP_ID);
		if ($group[self::ROW_GROUP_USER_TITLE]) {
			return $group[self::ROW_GROUP_USER_TITLE];
		}
		if ($user[self::ROW_USERS_GROUP_ID] == self::GUEST_GROUP_ID) {
			return self::GUEST;
		}
		// TODO: ranks
		// foreach ($this->ranks as $rank) {
		// 	if (intval($user[self::ROW_USERS_POSTS_COUNT]) >= $rank->posts) {
		// 		return $rank->name;
		// 	}
		// }
		return self::MEMBER;
	}
}
