# PHP package to format number according to SI standards

Github: 
![GitHub tag](https://img.shields.io/github/v/tag/toolstud-io/si_format)
![Tests](https://github.com/toolstud-io/si_format/workflows/Run%20Tests/badge.svg)
![Psalm](https://github.com/toolstud-io/si_format/workflows/Detect%20Psalm%20warnings/badge.svg)

Packagist: 
[![Packagist Version](https://img.shields.io/packagist/v/toolstud-io/si_format.svg?style=flat-square)](https://packagist.org/packages/toolstud-io/si_format)
[![Packagist Downloads](https://img.shields.io/packagist/dt/toolstud-io/si_format.svg?style=flat-square)](https://packagist.org/packages/toolstud-io/si_format)

PHP package to format number according to SI standards

	created on 2021-11-13 by peter@forret.com

## Installation

You can install the package via composer:

```bash
composer require toolstud-io/si_format
```

## Usage

``` php
$obj = new ToolstudIo\SiFormat(false,"m");
echo $obj->format(1000000);
// returns "1km"
echo $obj->format(.001);
// returns "1mm"

$obj = new ToolstudIo\SiFormat(false,"B",1024);
echo $obj->format(1024);
// returns "1KB"

```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email author_email instead of using the issue tracker.

## Credits

- [Peter Forret](https://github.com/toolstud-io)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
