# Filesystem Package

The Filesystem package provides a robust and flexible interface for managing file operations across different storage backends. Designed with an emphasis on simplicity and efficiency, this package supports various filesystem operations, including reading, writing, deleting, and renaming files, as well as managing directories.

Key features include:

* Multiple Storage Adapters: Easily switch between local, FTP, and cloud storage systems with a unified API.
* Stream Support: Create and manage file streams for efficient file handling.
* Checksum and Size Calculation: Built-in methods for generating checksums and retrieving file sizes, ensuring data integrity and management.
* MIME Type Detection: Automatically detect and return the MIME type of files, simplifying file handling based on content type.
* Robust Error Handling: Comprehensive exception handling ensures reliability during file operations.
* This package is ideal for developers looking to integrate filesystem capabilities into their applications while maintaining a clean and organized codebase.

## Requirements

* PHP 8.2 or later

## Installation via Composer

Add `"omegacms/filesystem": "^1.0.0"` to the require block in your `composer.json` file and then run `composer install`.

```json
{
    "require": {
        "omegacms/filesystem": "^1.0.0"
    }
}
```

Alternatively, you can simply run the folowing from the command line:

```sh
composer require omegacms/filesystem "^1.0.0"
```

If you want to include the test sources, use:

```sh
composer require --prefer-source omegacms/filesystem "^1.0.0"
```

## Documentation

Work in progress

## Contributing

If you'd like to contribute to the OmegaCMS Filesystem package, please follow our [contribution guidelines](CONTRIBUTING.md).

## License

This project is open-source software licensed under the [GNU General Public License v3.0](LICENSE).
