<?php

/**
 * @copyright Frederic G. Østby
 * @license   http://www.makoframework.com/license
 */

namespace mako\tests\unit\validator\rules;

use mako\tests\TestCase;
use mako\validator\rules\AlphanumericUnicode;

/**
 * @group unit
 */
class AlphanumericUnicodeTest extends TestCase
{
	/**
	 *
	 */
	public function testWithValidValue()
	{
		$rule = new AlphanumericUnicode;

		$this->assertTrue($rule->validate('foobær1', []));
	}

	/**
	 *
	 */
	public function testWithInvalidValue()
	{
		$rule = new AlphanumericUnicode;

		$this->assertFalse($rule->validate('foobær1!', []));

		$this->assertSame('The foobar field must contain only letters and numbers.', $rule->getErrorMessage('foobar'));
	}
}