# heraphp - Aergo client interface for PHP

Supported features:

* Get Account State
* Query Smart Contract
* Call Smart Contract
* Transfer

Tested with PHP 5.3


## Usage

Copy the files to your web site and include the `aergo.php` in your project:

```php
require 'aergo.php';
```

If you want to rebuild the vendor folder, these are the requirements:

```
composer require grpc/grpc
composer require google/protobuf
composer require "tuupola/base58:^1.0"
composer require simplito/elliptic-php
```

## Documentation

A basic documentation is available on the [wiki](https://github.com/aergoio/heraphp/wiki)


## Examples

Check the `example.php`
