# MetaTag

The helper class for make html meta tag on php and laravel.

## Summary

- Meta - simple data object.
- MetaTag - generate `<meta>`tag by Meta.

## Installation

```sh
composer require cosmos/metatag
```

## Usage

### Use Meta and MetaTag

```php
use Cosmos\MetaTag\Meta;
use Cosmos\MetaTag\MetaTag;

$data = [
  'description' => "The helper class for make html meta tag on php and laravel.",
  'author' => 'archco',
  'keywords' => ['PHP', 'Composer', 'Code', 'Github']
];

$meta = new Meta($data);
$metaTag = new MetaTag($meta);

echo $metaTag->display();
```

### Use only meta as data object

```php
use Cosmos\MetaTag\Meta;

$meta = new Meta($data);

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
