<?php
/**
 * Part of Omega CMS -  Filesystem Package
 *
 * @link       https://omegacms.github.io
 * @author     Adriano Giovannini <omegacms@outlook.com>
 * @copyright  Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

/**
 * @declare
 */
declare( strict_types = 1 );

/**
 * @namespace
 */
namespace Omega\Filesystem\Exceptions;

/**
 * @use
 */
use RuntimeException;

/**
 * Unsupported driver exception class.
 *
 * The `UnsupportedFilesystemException` thrown when attempting to use an unsupported filesystem driver.
 *
 * @category    Omega
 * @package     Omega\Filesystem
 * @subpackage  Omega\Filesystem\Exception
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class UnsupportedFilesystemException extends RuntimeException
{
}