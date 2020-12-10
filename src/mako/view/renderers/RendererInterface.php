<?php

/**
 * @copyright Frederic G. Østby
 * @license   http://www.makoframework.com/license
 */

namespace mako\view\renderers;

/**
 * Renderer interface.
 */
interface RendererInterface
{
	/**
	 * Returns the rendered view.
	 *
	 * @param  string $__view__      View path
	 * @param  array  $__variables__ View variables
	 * @return string
	 */
	public function render(string $__view__, array $__variables__): string;
}
