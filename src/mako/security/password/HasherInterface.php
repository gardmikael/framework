<?php

/**
 * @copyright Frederic G. Østby
 * @license   http://www.makoframework.com/license
 */

namespace mako\security\password;

/**
 * Hahser interface.
 */
interface HasherInterface
{
	/**
	 * Creates a password hash.
	 *
	 * @param  string $password Password
	 * @return string
	 */
	public function create(string $password): string;

	/**
	 * Verifies that the password matches the hash.
	 *
	 * @param  string $password Password
	 * @param  string $hash     Hash
	 * @return bool
	 */
	public function verify(string $password, string $hash): bool;

	/**
	 * Returns TRUE if the password needs rehashing and FALSE if not.
	 *
	 * @param  string $hash Hash
	 * @return bool
	 */
	public function needsRehash(string $hash): bool;
}
