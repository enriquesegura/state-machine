<?php

namespace MP\State;

class GiftWrapped implements StateInterface
{
	const TYPE = 'gift-wrapped';

	/**
	 * @return string
	 */
	public function getType()
	{
		return self::TYPE;
	}
}
