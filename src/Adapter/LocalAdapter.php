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
use League\Flysystem\Local\LocalFilesystemAdapter;

/**
 * Local filesystem driver.
 *
 * The `LocalAdapter` class represents a filesystem adapter designed for local storage using Flysystem.
 * It extends the abstract filesystem adapter, providing specific implementation details to connect to
 * the local filesystem using Flysystem's LocalFilesystemAdapter.
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
class LocalAdapter extends AbstractFilesystemAdapter
{
    /**
     * @inheritdoc
     *
     * @return void
     */
    public function connect() : void
    {
        $adapter = new LocalFilesystemAdapter( $this->config[ 'path' ] );
        $this->filesystem = new Filesystem( $adapter );
    }
}