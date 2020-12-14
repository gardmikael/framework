<?php

/**
 * @copyright Frederic G. Østby
 * @license   http://www.makoframework.com/license
 */

namespace mako\tests\unit\syringe;

use mako\syringe\ClassInspector;
use mako\tests\TestCase;

// --------------------------------------------------------------------------
// START CLASSES
// --------------------------------------------------------------------------

trait A
{

}

trait B
{
	use A;
}

trait C
{

}

class D
{
	use B, C;
}

class E extends D
{

}

// --------------------------------------------------------------------------
// END CLASSES
// --------------------------------------------------------------------------

/**
 * @group unit
 */
class ClassInspectorTest extends TestCase
{
	public function testGetClassTraits(): void
	{
		$traitsD = ClassInspector::getTraits('mako\tests\unit\syringe\D');

		$traitsE = ClassInspector::getTraits('mako\tests\unit\syringe\E');

		$expectedTraits =
		[
			'mako\tests\unit\syringe\C' => 'mako\tests\unit\syringe\C',
			'mako\tests\unit\syringe\B' => 'mako\tests\unit\syringe\B',
			'mako\tests\unit\syringe\A' => 'mako\tests\unit\syringe\A',
		];

		$this->assertEquals($expectedTraits, $traitsD);

		$this->assertEquals($traitsD, $traitsE);
	}
}
