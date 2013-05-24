<?php

namespace App\Model;

class DatabaseReflection extends \Nette\Database\Reflection\DiscoveredReflection
{
	public function getPrimary($table)
	{
		if ($table == Mapping\IPostsMapper::TABLE_ONLINE) {
			return array(
				Mapping\IPostsMapper::ROW_ONLINE_USER_ID,
				Mapping\IPostsMapper::ROW_ONLINE_IDENT,
			);
		}
		return parent::getPrimary($table);
	}
}
