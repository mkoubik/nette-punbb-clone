<?php

namespace App\Model;

class ConfigRepository
{
	const TABLE_CONFIG = 'pun_config';
	const ROW_CONFIG_NAME = 'conf_name';
	const ROW_CONFIG_VALUE = 'conf_value';

	const CONFIG_BOARD_TITLE = 'o_board_title';

	private $selectionFactory;

	// TODO: reset on ConfigUpdated event?
	// TODO: cache?
	private $values = NULL;

	/**
	 * @param \Nette\Database\SelectionFactory $selectionFactory
	 */
	public function __construct(\Nette\Database\SelectionFactory $selectionFactory)
	{
		$this->selectionFactory = $selectionFactory;
	}

	/**
	 * @param  string $name
	 * @return string value
	 * @throws \App\Model\Exception\NotFoundException If configuration option does not exist
	 */
	public function getValue($name)
	{
		if ($this->values === NULL) {
			$this->values = $this->selectionFactory->table(self::TABLE_CONFIG)
				->fetchPairs(self::ROW_CONFIG_NAME, self::ROW_CONFIG_VALUE);
		}
		if (!isset($this->values[$name])) {
			throw new \App\Model\Exception\NotFoundException();
		}
		return $this->values[$name];
	}
}
