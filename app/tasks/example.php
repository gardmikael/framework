<?php

use \mako\Arr;
use \mako\String;

class Example extends \mako\reactor\Task
{
	public function run($name = 'world')
	{
		$this->cli->stdout('Hello ' . $name . '!');
	}

	public function random()
	{
		$color = Arr::random(array('red', 'purple', 'cyan', 'green', 'yellow', 'blue'));

		$this->cli->stdout('Random ' . $color . ' string: ' . $this->cli->color(String::random(), $color));
	}
}