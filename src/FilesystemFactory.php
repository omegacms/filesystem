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
namespace Omega\Filesystem;

/**
 * @use
 */
use Closure;
use Omega\Filesystem\Adapter\AbstractFilesystemAdapter;
use Omega\Filesystem\Exceptions\UnsupportedFilesystemException;
use Omega\ServiceProvider\ServiceProviderInterface;

/**
 * Filesystem factory class.
 *
 * This `FilesystemFactory` class serves as a factory for creating instances of filesystem adapters
 * based on provided configurations. It allows for the registration of custom filesystem drivers through
 * a flexible and extensible API.
 *
 * @category    Omega
 * @package     Omega\Filesystem
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class FilesystemFactory implements ServiceProviderInterface
{
    /**
     * Array of registered filesystem drivers.
     *
     * @var array $drivers Holds an array of drivers.
     */
    protected array $drivers;

    /**
     * Register a new filesystem driver.
     *
     * @param  string  $alias  Holds the driver alias.
     * @param  Closure $driver Holds a Closure that returns an instance of the filesystem adapter.
     * @return $this
     */
    public function register( string $alias, Closure $driver ) : static
    {
        $this->drivers[ $alias ] = $driver;

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @param  array $config Holds an array of configuration for the filesystem.
     * @return AbstractFilesystemAdapter Returns an instance of the filesystem adapter.
     * @throws UnsupportedFilesystemException if the filesystem type is not defined or unrecognised.
     */
    public function bootstrap( array $config ) : AbstractFilesystemAdapter
    {
        if ( ! isset( $config[ 'type' ] ) ) {
            throw new UnsupportedFilesystemException(
                'Type is not defined.'
            );
        }

        $type = $config[ 'type' ];

        if ( isset( $this->drivers[ $type ] ) ) {
            return $this->drivers[ $type ]( $config );
        }

        throw new UnsupportedFilesystemException(
            'Unrecognised type.'
        );
    }
}