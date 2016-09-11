<?php

namespace MP\State;

class Printed implements StateInterface
{
	const TYPE = 'printed';

	/**
	 * @return string
	 */
	public function getType()
	{
		return self::TYPE;
	}
}
