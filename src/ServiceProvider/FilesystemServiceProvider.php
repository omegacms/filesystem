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
namespace Omega\Filesystem\ServiceProvider;

/**
 * @use
 */
use Omega\Filesystem\FilesystemFactory;
use Omega\Filesystem\Adapter\LocalAdapter;
use Omega\ServiceProvider\AbstractServiceProvider;
use Omega\ServiceProvider\ServiceProviderInterface;

/**
 * Filesystem service provider class.
 *
 * @category    Omega
 * @package     Omega\Filesystem
 * @subpackage  Omega\Filesystem\ServiceProvider
 * @link        https://omegacms.github.com
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.com)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class FilesystemServiceProvider extends AbstractServiceProvider
{
    /**
     * Get the service name.
     *
     * @return string Return the service name.
     */
    protected function name() : string
    {
        return 'filesystem';
    }

    /**
     * Get the service factory.
     *
     * @return mixed
     */
    protected function factory() : ServiceProviderInterface
    {
        return new FilesystemFactory();
    }

    /**
     * Get drivers.
     *
     * @return array Return an array of drivers for the service.
     */
    protected function drivers() : array
    {
        return [
            'local' => function ( $config ) {
                return new LocalAdapter( $config );
            },
        ];
    }
}