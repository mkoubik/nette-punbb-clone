<?php

namespace App\Model;

class ForumsRepository
{
	const TABLE_FORUMS = 'pun_forums';
	const ROW_FORUMS_ID = 'id';
	const ROW_FORUMS_NAME = 'forum_name';

	private $connection;

	/**
	 * @param \Nette\Database\Connection $connection
	 */
	public function __construct(\Nette\Database\Connection $connection)
	{
		$this->connection = $connection;
	}

	/**
	 * @param  int $id
	 * @return string forum name
	 * @throws \App\Model\Exceptions\NotFoundException If forum does not exist
	 */
	public function getNameById($id)
	{
		$row = $this->connection->table(self::TABLE_FORUMS)
			->where(self::ROW_FORUMS_ID, $id)
			->select(self::ROW_FORUMS_NAME)
			->fetch();
		if ($row === FALSE) {
			throw new \App\Model\Exceptions\NotFoundException();
		}
		return $row[self::ROW_FORUMS_NAME];
	}
}
