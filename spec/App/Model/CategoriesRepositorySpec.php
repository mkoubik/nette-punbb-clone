<?php

namespace spec\App\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Nette\Database\SelectionFactory;
use App\Model\Mapping\ICategoriesMapper;

class CategoriesRepositorySpec extends ObjectBehavior
{
	function let(SelectionFactory $selectionFactory, ICategoriesMapper $mapper, \Nette\Database\Table\Selection $selection)
	{
		$selectionFactory->table(Argument::any())->willReturn($selection);
		$selection->order(Argument::any())->willReturn($selection);
		$selection->fetchAll()->willReturn(array());

		$mapper->mapCategoriesList(array())->willReturn(array());

		$this->beConstructedWith($selectionFactory, $mapper);
	}

	function it_is_initializable()
	{
		$this->shouldHaveType('App\Model\CategoriesRepository');
	}

	function it_fetches_all_categoires()
	{
		$this->getAll()->shouldReturn(array());
	}
}
