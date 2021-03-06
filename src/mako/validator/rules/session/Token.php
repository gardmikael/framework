<?php

/**
 * @copyright Frederic G. Østby
 * @license   http://www.makoframework.com/license
 */

namespace mako\validator\rules\session;

use mako\session\Session;
use mako\validator\rules\Rule;
use mako\validator\rules\RuleInterface;
use mako\validator\rules\traits\ValidatesWhenEmptyTrait;

/**
 * Token rule.
 */
class Token extends Rule implements RuleInterface
{
	use ValidatesWhenEmptyTrait;

	/**
	 * Session.
	 *
	 * @var \mako\session\Session
	 */
	protected $session;

	/**
	 * Constructor.
	 *
	 * @param \mako\session\Session $session Session
	 */
	public function __construct(Session $session)
	{
		$this->session = $session;
	}

	/**
	 * {@inheritDoc}
	 */
	public function validate($value, array $input): bool
	{
		return $this->session->validateToken($value);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getErrorMessage(string $field): string
	{
		return 'Invalid security token.';
	}
}
