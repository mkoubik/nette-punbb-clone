<?php

namespace App\Model;

class TopicsRepository
{
	private $selectionFactory;

	private $mapper;

	/**
	 * @param \Nette\Database\SelectionFactory $connection
	 * @param \App\Model\Mapping\ITopicsMapper $mapper
	 */
	public function __construct(\Nette\Database\SelectionFactory $selectionFactory, Mapping\ITopicsMapper $mapper)
	{
		$this->selectionFactory = $selectionFactory;
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
		$topics = $this->selectionFactory->table($mapper::TABLE_TOPICS)
			->where($mapper::ROW_TOPICS_FORUM_ID, $id)
			->order($mapper::ROW_TOPICS_LAST_POST_POSTED . ' DESC')
			->fetchAll();
		return $mapper->mapTopicsList($topics);
	}

	/**
	 * @param  int $id
	 * @return array [name => 'name', 'forumId' => 123]
	 * @throws \App\Model\Exceptions\NotFoundException If forum does not exist
	 */
	public function getNameAndForumIdById($id)
	{
		$mapper = $this->mapper;
		$row = $this->selectionFactory->table($mapper::TABLE_TOPICS)
			->where($mapper::ROW_TOPICS_ID, $id)
			->select($mapper::ROW_TOPICS_NAME . ', ' . $mapper::ROW_TOPICS_FORUM_ID)
			->fetch();
		if ($row === FALSE) {
			throw new \App\Model\Exceptions\NotFoundException();
		}
		return $mapper->mapNameAndForumId($row);
	}
}
