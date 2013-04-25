<?php

namespace App\Model;

class TopicsRepository
{
	private $connection;

	private $mapper;

	/**
	 * @param \Nette\Database\Connection $connection
	 * @param \App\Model\Mapping\ITopicsMapper $mapper
	 */
	public function __construct(\Nette\Database\Connection $connection, Mapping\ITopicsMapper $mapper)
	{
		$this->connection = $connection;
		$this->mapper = $mapper;
	}

	/**
	 * Get list of topics in a forum sorted by last post.
	 * @param int $id forum id
	 * @return \App\Model\DTO\TopicsList\Topic[]
	 */
	public function getByForumId($id)
	{
		$mapper = $this->mapper;
		$topics = $this->connection->table($mapper::TABLE_TOPICS)
			->where($mapper::ROW_TOPICS_FORUM_ID, $id)
			->order($mapper::ROW_TOPICS_LAST_POST_POSTED . ' DESC')
			->fetchAll();
		return $mapper->mapTopicsList($topics);
	}
}
