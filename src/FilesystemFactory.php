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
 * @category    Omega
 * @package     Omega\Filesystem
 * @link        https://omegacms.github.com
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.com)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class FilesystemFactory implements ServiceProviderInterface
{
    /**
     * Drivers array.
     *
     * @var array $drivers Holds an array of drivers.
     */
    protected array $drivers;

    /**
     * Add driver.
     *
     * @param  string  $alias  Holds the driver alias.
     * @param  Closure $driver Holds an instance of Closure.
     * @return $this
     */
    public function register( string $alias, Closure $driver ) : static
    {
        $this->drivers[ $alias ] = $driver;

        return $this;
    }

    /**
     * Connect the driver.
     *
     * @param  array $config Holds an array of configuration.
     * @return mixed
     * @throws UnsupportedFilesystemException if the filesystem is not defined or unrecognised.
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