# MetaTag
The helper class for make html meta tag on php and laravel.

## Summary
* Meta - simple data object.
* MetaTag - generate `<meta>`tag by Meta.

## Usage
### Use Meta and MetaTag
```
  $data = [
    'description' => "The helper class for make html meta tag on php and laravel.",
    'author' => 'archco',
    'keywords' => ['PHP', 'Composer', 'Code', 'Github']
  ];
  $meta = new \Cosmos\MetaTag\Meta($data);
  $metaTag = new \Cosmos\MetaTag\MetaTag($meta);
  
  echo $metaTag->display();
```
### Use only meta as data object
```
  $meta = new \Cosmos\MetaTag\Meta($data);
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
The MIT License (MIT). Please see [License File](https://github.com/archco/MetaTag/blob/master/LICENSE) for more information.
