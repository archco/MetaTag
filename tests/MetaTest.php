<?php

use Cosmos\MetaTag\Meta;
use PHPUnit\Framework\TestCase;

class MetaTest extends TestCase
{
    protected $baseArray;
    protected $extendedArray;

    public function setUp(): void
    {
        $this->baseArray = [
            'title' => "Extended Title",
            'description' => "This is extend description text.",
            'author' => "Paul",
            'keywords' => ['PHP', 'Composer', 'Code', 'Github'],
            'image' => "http://php.net/images/logo.php",
            'url' => "https://github.com/archco/MetaTag"
        ];
        $this->extendedArray = [
            'description' => $this->baseArray['description'],
            'author' => $this->baseArray['author'],
            'keywords' => $this->baseArray['keywords'],
            'og:type' => 'website',
            'og:title' => $this->baseArray['title'],
            'og:description' => $this->baseArray['description'],
            'og:image' => $this->baseArray['image'],
            'og:url' => $this->baseArray['url'],
            'twitter:card' => 'summary_large_image'
        ];
    }

    public function testCanBeCreatedFromArray()
    {
        $this->assertInstanceOf(Meta::class, new Meta($this->baseArray));
    }

    public function testSetProperty()
    {
        $meta = new Meta($this->baseArray);
        $meta->author = 'James';

        $this->assertEquals($meta->get('author'), 'James');
    }

    public function testRemoveProperty()
    {
        $meta = new Meta($this->baseArray);
        $meta->remove('url');

        $this->assertEmpty($meta->get('url'));
    }

    public function testSetKeywordsAsString()
    {
        $meta = new Meta(['keywords' => 'a,b,c']);
        $meta->set('keywords', 'c,d,e');

        $this->assertEquals($meta->get('keywords'), 'a,b,c,d,e');
    }

    public function testSetKeywordsAsArray()
    {
        $meta = new Meta(['keywords' => 'a,b,c']);
        $meta->set('keywords', ['c', 'd', 'e']);

        $this->assertEquals($meta->get('keywords'), 'a,b,c,d,e');
    }

    public function testSetKeywordsAsEmpty()
    {
        $meta = new Meta(['keywords' => 'a,b,c']);
        $meta->set('keywords', '');
        $this->assertEquals($meta->get('keywords'), null);
    }
}
