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
use function function_exists;
use function implode;
use function ltrim;
use function strtolower;

/**
 * This file container various function for manipulating the filesystem
 * and paths.
 * 
 * @category    Omega
 * @package     Omega\Filesystem
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
if ( ! function_exists( 'join_paths' ) ) :
    /**
     * Join the given path.
     * 
     * @param  ?string $basePath Holds the base path to join.
     * @param  string  ...$paths Holds the paths to join.
     * @return string Return the joined paths.
     */
    function join_paths( string $basePath, string ...$paths ) : string
    {
        foreach ( $paths as $index => $path ) {
            if ( empty( $path ) ) {
                unset( $paths[ $index ] );
            } else {
                $paths[ $index ] = DIRECTORY_SEPARATOR . ltrim( $path, DIRECTORY_SEPARATOR );
            }
        }

        return $basePath . implode( '', $paths );
    }
endif;

if ( ! function_exists( 'get_operating_system' ) ) :
    /**
     * Get the operating system name.
     *
     * @return string Returns the operating system name (e.g., "mac", "windows", "linux", or "unknown").
     */
    function get_operating_system() : string
    {
        $os = strtolower( PHP_OS_FAMILY );

        switch ( $os ) {
            case 'darwin':
                return 'mac';
            case 'win':
                return 'windows';
            case 'linux':
                return 'linux';
            default:
                return 'unknown';
        }
    }
endif;

if ( ! function_exists( 'normalize_path' ) ) :
    /**
     * Normalize path based on filesystem type.
     * 
     * @return void
     */
    function normalize_path() : void
    {
        /**
         * @todo To be implemented.
         */
    }
endif;