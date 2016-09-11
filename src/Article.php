<?php

namespace MP;

use MP\State\StateInterface;

class Article
{
	const TYPE_POSTER_FRAMED = 'poster-framed';
	const TYPE_PRINTED_GLASS = 'printed-glass';

	/**
	 * @var string
	 */
	protected $articleType;

	/**
	 * @var bool
	 */
	protected $hasGiftWrapping = false;

	/**
	 * Article constructor.
	 * @param string $articleType
	 */
	public function __construct($articleType)
	{
		$this->validateType($articleType);

		$this->articleType = $articleType;
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->articleType;
	}

	/**
	 * @return $this
	 */
	public function enableGiftWrapping()
	{
		$this->hasGiftWrapping = true;

		return $this;
	}

	/**
	 * @return bool
	 */
	public function hasGiftWrapping()
	{
		return $this->hasGiftWrapping;
	}

	/**
	 * @return StateInterface
	 */
	public function getState()
	{
	}

	/**
	 * @param string $articleType
	 * @return $this
	 */
	protected function validateType($articleType)
	{
		if (! $this->isTypeValid($articleType)) {
			throw new \InvalidArgumentException(sprintf('unknown article type given: %s', $articleType));
		}

		return $this;
	}

	/**
	 * @param string $articleType
	 * @return bool
	 */
	protected function isTypeValid($articleType)
	{
		return in_array($articleType, self::getTypes());
	}

	/**
	 * @return array
	 */
	public static function getTypes()
	{
		return [
			self::TYPE_POSTER_FRAMED,
			self::TYPE_PRINTED_GLASS,
		];
	}
}
