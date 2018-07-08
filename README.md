# MetaTag

It's the library class for helpful the making html meta tags.

## Install

``` sh
composer require cosmos/metatag
```

## Usage

### Basic

``` php

use Cosmos\MetaTag\MetaTag;

$data = [
  'description' => "The helper class for make html meta tag on php and laravel.",
  'author' => 'archco',
  'keywords' => ['PHP', 'Composer', 'Code', 'Github']
];

$metaTag = new MetaTag($data);

echo $metaTag->display();
```

### Modify data

``` php

use Cosmos\MetaTag\MetaTag;

$meta = new MetaTag($data);

// add property
$meta->good = "thing";
$meta->set('name', 'content');

// modify property
$meta->author = "James";
$meta->set('name', 'another content');

// remove property
$meta->remove('good');
```

## License

[MIT License](https://github.com/archco/MetaTag/blob/master/LICENSE)
