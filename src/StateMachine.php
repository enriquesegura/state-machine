<?php

namespace MP;


use MP\State\GiftWrapped;
use MP\State\Ordered;
use MP\State\Printed;
use MP\State\Shipped;
use MP\State\Sliced;
use MP\State\Framed;
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
		if (!$this->validateState($state, $article)) {
			$currentState = $article->getState() ? $article->getState()->getType() : 'no-state';
			throw new \Exception("Invalid state {$state->getType()} for article {$article->getType()} with current state $currentState");
			return;
		}
		$article->setState($state);
	}

	protected function validateState(StateInterface $state, Article $article)
	{
		$workflow = $this->getWorkflowOfArticle($article);
		return in_array($state->getType(), $workflow[$article->getState() ? $article->getState()->getType() : null]);
	}
	
	protected function getWorkflowOfArticle(Article $article)
	{
		switch ($article->getType()) {
			case Article::TYPE_POSTER_FRAMED:
				$workflow = [
					null => [Ordered::TYPE],
					Ordered::TYPE => [Printed::TYPE],
					Printed::TYPE => [Sliced::TYPE],
					Sliced::TYPE => [Framed::TYPE],
					Framed::TYPE => [Shipped::TYPE],
					Shipped::TYPE => [],
				];
				if ($article->hasGiftWrapping()) {
					$workflow[Framed::TYPE] = [GiftWrapped::TYPE];
					$workflow[GiftWrapped::TYPE] = [Shipped::TYPE];
				}
				return $workflow;
				break;
			case Article::TYPE_PRINTED_GLASS:
				$workflow = [
					null => [Ordered::TYPE],
					Ordered::TYPE => [Printed::TYPE],
					Printed::TYPE => [Shipped::TYPE],
					Shipped::TYPE => [],
				];
				if ($article->hasGiftWrapping()) {
					$workflow[Printed::TYPE] = [GiftWrapped::TYPE];
					$workflow[GiftWrapped::TYPE] = [Shipped::TYPE];
				}
				return $workflow;
				break;
		}
		return [];
	}
}
