<?php

namespace App\ForumModule\Controls;

interface INavigationFactory
{
	/** @return \App\ForumModule\Controls\Navigation */
	public function create();
}
