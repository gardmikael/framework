<?php

/**
 * @copyright Frederic G. Østby
 * @license   http://www.makoframework.com/license
 */

namespace mako\cli\output\helpers;

use mako\cli\output\Output;

use function str_repeat;

/**
 * Terminal bell helper.
 */
class Bell
{
	/**
	 * Output instance.
	 *
	 * @var \mako\cli\output\Output
	 */
	protected $output;

	/**
	 * Constructor.
	 *
	 * @param \mako\cli\output\Output $output Output instance
	 */
	public function __construct(Output $output)
	{
		$this->output = $output;
	}

	/**
	 * Rings the terminal bell n times.
	 *
	 * @param int $times Number of times to ring the bell
	 */
	public function ring(int $times = 1): void
	{
		$this->output->write(str_repeat("\x07", $times));
	}
}
