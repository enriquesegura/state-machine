<?php

namespace MP\State;

class Shipped implements StateInterface
{
	const TYPE = 'shipped';

	/**
	 * @return string
	 */
	public function getType()
	{
		return self::TYPE;
	}
}
