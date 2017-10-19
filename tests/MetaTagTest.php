<?php

use Cosmos\MetaTag\Meta;
use Cosmos\MetaTag\MetaTag;
use PHPUnit\Framework\TestCase;

class MetaTagTest extends TestCase
{
    protected $meta;

    public function setUp()
    {
        $this->meta = new Meta([
            'title' => 'Extended Title',
            'description' => 'This is extend description text.',
            'author' => 'Faul',
            'keywords' => ['PHP', 'Composer', 'Code', 'Github'],
            'image' => 'http://php.net/images/logo.php',
            'url' => 'https://github.com/archco/MetaTag',
            'og:type' => 'website',
            'og:title' => 'Extended Title',
            'og:description' => 'This is extend description text.',
            'og:image' => 'http://php.net/images/logo.php',
            'og:url' => 'https://github.com/archco/MetaTag',
            'twitter:card' => 'summary_large_image',
        ]);
    }

    public function testCanBeCreatedFromMeta()
    {
        $metaTag = new MetaTag($this->meta);
        // print_r($metaTag);

        $this->assertInstanceOf(MetaTag::class, $metaTag);
    }
}
