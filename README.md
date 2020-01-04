# MetaTag

A helpful library class for making HTML `<meta>` tags.

## Install

``` sh
composer require cosmos/metatag
```

## Usage

### Basic

``` php

use Cosmos\MetaTag\MetaTag;

$data = [
  'description' => "A helper class for making html meta tag.",
  'author' => 'John',
  'keywords' => ['PHP', 'Composer', 'Code', 'Github']
];

$metaTag = new MetaTag($data);

echo $metaTag->display();
// <meta property="description" content="A helper class for making html meta tag.">
// <meta property="author" content="John">
// <meta property="keywords" content="PHP,Composer,Code,Github">
```

### Access Properties

``` php

use Cosmos\MetaTag\MetaTag;

$meta = new MetaTag($data);

// add or modify properties.
$meta->author = "James";
$meta->set('name', 'another content');

// get property.
$name = $meta->get('name');

// remove property
$meta->remove('name');
```

## License

[MIT License](https://github.com/archco/MetaTag/blob/master/LICENSE)
