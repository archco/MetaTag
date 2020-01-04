<?php

use Cosmos\MetaTag\MetaTag;
use PHPUnit\Framework\TestCase;

class MetaTagTest extends TestCase
{
    protected $data;

    public function setUp(): void
    {
        $this->data = [
            'title' => 'Extended Title',
            'description' => 'This is extend description text.',
            'author' => 'Paul',
            'keywords' => ['PHP', 'Composer', 'Code', 'Github'],
            'image' => 'http://php.net/images/logo.php',
            'url' => 'https://github.com/archco/MetaTag',
            'og:type' => 'website',
            'og:title' => 'Extended Title',
            'og:description' => 'This is extend description text.',
            'og:image' => 'http://php.net/images/logo.php',
            'og:url' => 'https://github.com/archco/MetaTag',
            'twitter:card' => 'summary_large_image',
        ];
    }

    public function testCanBeCreated()
    {
        $metaTag = new MetaTag(['title' => 'Hello']);

        $this->assertInstanceOf(MetaTag::class, $metaTag);
        $this->assertEquals($metaTag->title, 'Hello');
    }

    public function testMakeTagShouldWorks()
    {
        $metaTag = new MetaTag();

        $this->assertEquals(
            $metaTag->makeTag('author', 'Paul'),
            '<meta name="author" content="Paul">'
        );
        // og
        $this->assertEquals(
            $metaTag->makeTag('og:type', 'website'),
            '<meta property="og:type" content="website">'
        );
    }
}
