<?php

namespace MP\State;

class Sliced implements StateInterface
{
	const TYPE = 'sliced';

	/**
	 * @return string
	 */
	public function getType()
	{
		return self::TYPE;
	}
}
