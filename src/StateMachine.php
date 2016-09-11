<?php

namespace MP;

use MP\State\StateInterface;

class StateMachine
{
	/**
	 * @param StateInterface $state
	 * @param Article $article
	 * @throws \InvalidArgumentException
	 */
	public function confirmState(StateInterface $state, Article $article)
	{
	}
}
