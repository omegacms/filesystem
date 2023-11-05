<?php
/**
 * Part of Banco Omega CMS -  Filesystem Package
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
namespace Omega\Filesystem\Adapter;

/**
 * @use
 */
use League\Flysystem\FilesystemException;

/**
 * Filesystem adapter interface.
 *
 * @category    Omega
 * @package     Omega\Filesystem
 * @subpackage  Omega\Filesystem\Adapter
 * @link        https://omegacms.github.com
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.com)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
interface FilesystemAdapterInterface
{
    /**
     * List the filesystem content.
     *
     * @param  string $path      Holds the filesystem path.
     * @param  bool   $recursive Flag for determine recursion.
     * @return iterable Return an instance of iterable.
     * @throws FilesystemException
     */
    public function list( string $path, bool $recursive = false ) : iterable;

    /**
     * Determine if the filesystem exists.
     *
     * @param  string $path Holds the filesystem path.
     * @return bool Return true if the filesystem exists, false if not.
     * @throws FilesystemException
     */
    public function exists( string $path ) : bool;

    /**
     * Get from filesystem.
     *
     * @param  string $path Holds the filesystem path.
     * @return string Return the filesystem.
     * @throws FilesystemException
     */
    public function get( string $path ) : string;

    /**
     * Put on filesystem
     *
     * @param  string $path  Holds the filesystem path.
     * @param  mixed  $value Holds the value to put in the filesystem.
     * @return $this
     * @throws FilesystemException
     */
    public function put( string $path, mixed $value ) : static;

    /**
     * Delete from the filesystem.
     *
     * @param  string $path Holds the filesystem path.
     * @return $this
     * @throws FilesystemException
     */
    public function delete( string $path ) : static;

    /**
     * Connect to the filesystem.
     *
     * @return void
     */
    public function connect() : void;
}