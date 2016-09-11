<?php

namespace MP\State;

class Ordered implements StateInterface
{
	const TYPE = 'ordered';

	/**
	 * @return string
	 */
	public function getType()
	{
		return self::TYPE;
	}
}
