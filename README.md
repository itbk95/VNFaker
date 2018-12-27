# VNFaker

VNFaker is a Laravel package that generates fake data about name, city, address, phone, datetime,... in Viet Nam.

### Require
- PHP >= 5.3.3
- Laravel >= 5.0

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
vnfaker()->firstname($word = 1); // 1:Cường, 2: Huy Cường
vnfaker()->fullname($word = 3); // 3: Bùi Huy Cường, 4: Bùi Huy Hoàng Cường
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

#### `Email, username`

```php
vnfaker()->email(array $domain); //default: ['gmail.com', 'outlook.com', 'example.com'] -> buihuycuong@gmail.com
vnfaker()->username(); // buihuycuong
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
vnfaker()->generateOrderNo($length = 6, $prefix = null, $postfix = null, $numbers = false, $letters = false, $uppercase = false, $lowercase = false); // DHF3K8
```

#### `String`

```php
vnfaker()->paragraphs(int $paragraph = 1, bool $array = false, $glue = '<br>'); // Tình yêu đến em không mong đợi gì. Tình yêu đi em không hề hối tiếc.
vnfaker()->words(int $word = 2, bool $array = false, $glue = ', '); // Bùi, Huy
vnfaker()->sentences(int $sentence = 1, bool $array = false, $glue = '. '); // Tình yêu đến em không mong đợi gì
vnfaker()->vnToString($str = "Bùi Huy Cường"); // Bui Huy Cuong
vnfaker()->str_clean($string, $remove_space = false); // remove all special characters
```

#### `Color`

```php
vnfaker()->hexcolor(); // #830f0
vnfaker()->colorName(); // red
```

#### `File`

```php
vnfaker()->file($name = null, array $extentions = ['png', 'jpg'], $width = 100, $height = 100, $mimeType = 'image'); // avatar.png
```

#### `More`

```php
vnfaker()->company(); // Tập Đoàn Vingroup
vnfaker()->gender(); // Nam | Nữ
vnfaker()->array_rand(array $items, $num = 1, $array = false, $glue = ',');
```

### Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

### Author
- [Bui Huy Cuong](https://medium.com/@buihuycuong/)