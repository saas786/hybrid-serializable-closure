# Hybrid Serializable Closure

Hybrid Serializable Closure provides an easy and secure way to serialize closures in PHP.

## Requirements

* PHP 8.2+.
* [Composer](https://getcomposer.org/) for managing PHP dependencies.

## Installation

First, install Hybrid Core Serializable Closure via the [Composer](https://getcomposer.org/) package manager:

```bash
composer require themehybrid/hybrid-serializable-closure
```

### Usage

You may serialize a closure this way:

```php
use Hybrid\SerializableClosure\SerializableClosure;

$closure = fn () => 'james';

// Recommended
SerializableClosure::setSecretKey('secret');

$serialized = serialize(new SerializableClosure($closure));
$closure = unserialize($serialized)->getClosure();

echo $closure(); // james;
```
## Caveats

* Multiple closures defined on the same source line with identical signatures may not be distinguishable after serialization. Place each closure on its own line to avoid this.

## Copyright and License

This project is licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

2008&thinsp;&ndash;&thinsp;2026 &copy; [Theme Hybrid](https://themehybrid.com).

## Third-Party Licenses

Hybrid Serializable Closure utilizes code from Laravel.

Repository: https://github.com/laravel/serializable-closure

License: MIT License - <https://opensource.org/licenses/MIT>

Copyright (c) Taylor Otwell
