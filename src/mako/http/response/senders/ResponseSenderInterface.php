<?php

/**
 * @copyright Frederic G. Østby
 * @license   http://www.makoframework.com/license
 */

namespace mako\http\response\senders;

use mako\http\Request;
use mako\http\Response;

/**
 * Response sender interface.
 */
interface ResponseSenderInterface
{
	/**
	 * Sends the response.
	 *
	 * @param \mako\http\Request  $request  Request instance
	 * @param \mako\http\Response $response Response instance
	 */
	public function send(Request $request, Response $response): void;
}
