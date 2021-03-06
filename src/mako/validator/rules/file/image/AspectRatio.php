<?php

/**
 * @copyright Frederic G. Østby
 * @license   http://www.makoframework.com/license
 */

namespace mako\validator\rules\file\image;

use mako\validator\rules\file\image\traits\GetImageSizeTrait;
use mako\validator\rules\Rule;
use mako\validator\rules\RuleInterface;

use function sprintf;

/**
 * Aspect ratio rule.
 */
class AspectRatio extends Rule implements RuleInterface
{
	use GetImageSizeTrait;

	/**
	 * Width.
	 *
	 * @var int
	 */
	protected $width;

	/**
	 * Height.
	 *
	 * @var int
	 */
	protected $height;

	/**
	 * Constructor.
	 *
	 * @param int $width  Width
	 * @param int $height Height
	 */
	public function __construct(int $width, int $height)
	{
		$this->width = $width;

		$this->height = $height;
	}

	/**
	 * I18n parameters.
	 *
	 * @var array
	 */
	protected $i18nParameters = ['width', 'height'];

	/**
	 * {@inheritDoc}
	 */
	public function validate($value, array $input): bool
	{
		[$width, $height] = $this->getImageSize($value);

		return ($this->width / $this->height) == ($width / $height);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getErrorMessage(string $field): string
	{
		return sprintf('The %1$s does not have the required aspect ratio of %2$s:%3$s.', $field, $this->width, $this->height);
	}
}
