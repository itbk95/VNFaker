# VNFaker

VNFaker is a Laravel package that generates fake data about name, city, address, phone, datetime,... in Viet Nam.

### Require
- VNFaker requires PHP >= 5.3.3
### Table of Contents

### Installation
```sh
composer require buihuycuong/vnfaker
```
### Basic Usage
Add to your class:
```php
use Buihuycuong\Vnfaker\VNFaker;
VNFaker::date();
// 12/02/1980
# or call via helper function
vnfaker()->date();
// 10/08/1996
```

#### `Name`

```php
vnfaker()->lastname(); // Bùi
vnfaker()->midname(); // Huy
vnfaker()->firstame(); // Cường
vnfaker()->fullname(); // Bùi Huy Cường
```

#### `Time`

```php
vnfaker()->date($symbol = '/'); // 12/02/1980
vnfaker()->year(); // 1990
vnfaker()->month(); // 10
vnfaker()->day(); // 05
```

#### `Address`

```php
vnfaker()->address(); // Hai bà trưng, Hà nội
vnfaker()->city($array = false); // Hà nội, true-> return 63 province.
```

#### `Phone`

```php
vnfaker()->mobilephone($numbers = 10); // 0979587347
vnfaker()->fixedLineNumber($numbers = 12); // 0248584903
vnfaker()->cityphone($numbers = 12); // 0240897395 (Ha Noi)
```

#### `Number`

```php
vnfaker()->int(); // 69
vnfaker()->maxInt(); // 2147483647
vnfaker()->float($min = 0, $max = 100, $decimals = 2); // 69,96
vnfaker()->numberBetween(int $min = 0, int $max = 100000); // 69
vnfaker()->boolean($string = true); // true|false : 1|0
```

#### `OrderNo`

```php
vnfaker()->generateOrderNo($length = 6, $numbers = false, $letters = false, $uppercase = false, $lowercase = false); // DHF3K8
```

#### `String`

```php
vnfaker()->paragraphs($paragraphs = 1, $wordInPara = 50);
vnfaker()->words($words = 10);
vnfaker()->sentences($sentences = 1);
```

#### `Color`

```php
vnfaker()->hexcolor(); // #830f0
vnfaker()->colorName(); // red
```

#### `File`

```php
vnfaker()->file($name = null, $extentions = 'png', $width = 100, $height = 100, $mimeType = 'image'); // abc.png
```

#### `More`

```php
vnfaker()->company(); //
vnfaker()->gender(); // Nam | Nữ
```

### Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

### Author
- [Bui Huy Cuong](https://medium.com/@buihuycuong/)