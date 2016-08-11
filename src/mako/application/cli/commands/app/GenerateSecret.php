<?php

/**
 * @copyright  Frederic G. Østby
 * @license    http://www.makoframework.com/license
 */

namespace mako\application\cli\commands\app;

use mako\application\Application;
use mako\file\FileSystem;
use mako\reactor\Command;
use mako\security\Key;

/**
 * Command that generates a new application secret.
 *
 * @author  Frederic G. Østby
 */
class GenerateSecret extends Command
{
	/**
	 * Make the command strict.
	 *
	 * @var boolean
	 */
	protected $isStrict = true;

	/**
	 * Command information.
	 *
	 * @var array
	 */
	protected $commandInformation =
	[
		'description' => 'Generates a new application secret.',
	];

	/**
	 * Executes the command.
	 *
	 * @access  public
	 * @param   \mako\application\Application  $application  Application instance
	 * @param   \mako\file\FileSystem          $fileSystem   File system instance
	 */
	public function execute(Application $application, FileSystem $fileSystem)
	{
		$configFile = $application->getPath() . '/config/application.php';

		if(!$fileSystem->isWritable($configFile))
		{
			$this->error('Unable to generate a new secret. Make sure that the [ app/config/application.php ] file is writable.');

			return;
		}

		$secret = Key::generateEncoded();

		$contents = $fileSystem->getContents($configFile);

		$contents = preg_replace('/\'secret\'(\s*)=>(\s*)\'(.*)\',/', '\'secret\'$1=>$2\'' . $secret . '\',', $contents);

		$fileSystem->putContents($configFile, $contents);

		$this->write('A new application secret has been generated.');
	}
}