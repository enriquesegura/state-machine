<?php

namespace MP\State;

class Framed implements StateInterface
{
	const TYPE = 'framed';

	/**
	 * @return string
	 */
	public function getType()
	{
		return self::TYPE;
	}
}
