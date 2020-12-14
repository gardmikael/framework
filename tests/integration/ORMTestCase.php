<?php

/**
 * @copyright Frederic G. Østby
 * @license   http://www.makoframework.com/license
 */

namespace mako\tests\integration;

/**
 * ORM test case.
 */
abstract class ORMTestCase extends BuilderTestCase
{
	/**
	 *{@inheritDoc}
	 */
	public function setup(): void
	{
		parent::setup();

		// Set the connection manager

		TestORM::setConnectionManager($this->connectionManager);
	}

	/**
	 * {@inheritDoc}
	 */
	public function tearDown(): void
	{
		$this->connectionManager->connection('sqlite')->clearLog();
	}
}
