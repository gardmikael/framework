<?php

/**
 * @copyright Frederic G. Østby
 * @license   http://www.makoframework.com/license
 */

namespace mako\http\routing\middleware;

use Closure;
use mako\http\Request;
use mako\http\Response;

/**
 * Middleware interface.
 */
interface MiddlewareInterface
{
	/**
	 * Executes the middleware.
	 *
	 * @param  \mako\http\Request  $request  Request
	 * @param  \mako\http\Response $response Response
	 * @param  \Closure            $next     Next layer
	 * @return \mako\http\Response
	 */
	public function execute(Request $request, Response $response, Closure $next): Response;
}
