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
namespace Omega\Filesystem\Adapter;

/**
 * @use
 */
use League\Flysystem\FilesystemException;

/**
 * Filesystem adapter interface.
 *
 * This `FilesystemAdapterInterface` defines a set of methods for interacting with a filesystem, providing
 * a standardized way to perform operations such as listing contents, checking existence, reading, writing,
 * and deleting files, as well as establishing a connection to the filesystem.
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
     * List the contents of the filesystem.
     *
     * @param  string $path      Holds the path within the filesystem.
     * @param  bool   $recursive Whether to list recursively or not.
     * @return iterable Returns an iterable representing the filesystem content.
     * @throws FilesystemException If an error occurs during the operation.
     */
    public function list( string $path, bool $recursive = false ) : iterable;

    /**
     * Check if a file or directory exists in the filesystem.
     *
     * @param  string $path Holds the path to check.
     * @return bool Returns true if the path exists, false otherwise.
     * @throws FilesystemException If an error occurs during the operation.
     */
    public function exists( string $path ) : bool;

    /**
     * Get the contents of a file from the filesystem.
     *
     * @param  string $path Holds the path to the file.
     * @return string Returns the contents of the file.
     * @throws FilesystemException If an error occurs during the operation.
     */
    public function get( string $path ) : string;

    /**
     * Put content into a file in the filesystem.
     *
     * @param  string $path  Holds the path to the file.
     * @param  mixed  $value Holds the content to put into the file.
     * @return $this
     * @throws FilesystemException If an error occurs during the operation.
     */
    public function put( string $path, mixed $value ) : static;

    /**
     * Delete a file or directory from the filesystem.
     *
     * @param  string $path Holds the path to the file or directory.
     * @return $this
     * @throws FilesystemException If an error occurs during the operation.
     */
    public function delete( string $path ) : static;

    /**
     * Connect to the filesystem.
     *
     * @return void
     */
    public function connect() : void;
}