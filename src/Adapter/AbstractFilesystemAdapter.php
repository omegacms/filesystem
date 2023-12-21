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
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;

/**
 * Abstract filesystem adapter class.
 *
 * This `AbstractFilesystemAdapter` class serves as a foundation for implementing specific filesystem adapters
 * by providing a consistent interface for common operations such as listing contents, checking existence,
 * reading, writing, and deleting files, as well as establishing a connection to the filesystem.
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
abstract class AbstractFilesystemAdapter implements FilesystemAdapterInterface
{
    /**
     * Filesystem object.
     *
     * @var Filesystem $filesystem Holds an instance of Filesystem.
     */
    protected Filesystem $filesystem;

    /**
     * Config array.
     *
     * @var array $config Holds an array of configiguration options.
     */
    protected array $config = [];

    /**
     * AbstractFilesystemAdapter class constructor.
     *
     * @param  array $config Holds an array of configuration options.
     * @return void
     */
    public function __construct( array $config )
    {
        $this->config = $config;

        $this->connect();
    }

    /**
     * @inheritdoc
     *
     * @param  string $path      Holds the path within the filesystem.
     * @param  bool   $recursive Whether to list recursively or not.
     * @return iterable Returns an iterable representing the filesystem content.
     * @throws FilesystemException If an error occurs during the operation.
     */
    public function list( string $path, bool $recursive = false ) : iterable
    {
        return $this->filesystem->listContents( $path, $recursive );
    }

    /**
     * @inheritdoc
     *
     * @param  string $path Holds the path to check.
     * @return bool Returns true if the path exists, false otherwise.
     * @throws FilesystemException If an error occurs during the operation.
     */
    public function exists( string $path ) : bool
    {
        return $this->filesystem->fileExists( $path );
    }

    /**
     * @inheritdoc
     *
     * @param  string $path Holds the path to the file.
     * @return string Returns the contents of the file.
     * @throws FilesystemException If an error occurs during the operation.
     */
    public function get( string $path ) : string
    {
        return $this->filesystem->read( $path );
    }

    /**
     * @inheritdoc
     *
     * @param  string $path  Holds the path to the file.
     * @param  mixed  $value Holds the content to put into the file.
     * @return $this
     * @throws FilesystemException If an error occurs during the operation.
     */
    public function put( string $path, mixed $value ) : static
    {
        $this->filesystem->write( $path, $value );

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @param  string $path Holds the path to the file or directory.
     * @return $this
     * @throws FilesystemException If an error occurs during the operation.
     */
    public function delete( string $path ) : static
    {
        $this->filesystem->delete( $path );

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @return void
     */
    abstract public function connect() : void;
}