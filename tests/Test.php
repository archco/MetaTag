<?php 
include dirname(__dir__) . '/vendor/autoload.php';
include 'MetaExtend.php';

use Cosmos\MetaTag\Meta;
use Cosmos\MetaTag\MetaTag;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    protected $defaults = [];
    protected $testValues = [];

    function __construct()
    {
        $this->defaults = [
            'title' => "Extended Title",
            'description' => "This is extend description text.",
            'author' => "Faul",
            'keywords' => ['PHP', 'Composer', 'Code', 'Github'],
            'image' => "http://php.net/images/logo.php",
            'url' => "https://github.com/archco/MetaTag"
        ];
        $this->testValues = [
            'description' => $this->defaults['description'],
            'author' => $this->defaults['author'],
            'keywords' => $this->defaults['keywords'],
            'og:type' => 'website',
            'og:title' => $this->defaults['title'],
            'og:description' => $this->defaults['description'],
            'og:image' => $this->defaults['image'],
            'og:url' => $this->defaults['url'],
            'twitter:card' => 'summary_large_image'
        ];
    }

    public function testOne()
    {
        $meta = new Meta($this->testValues);
        $metaTag = new MetaTag($meta);
        
        echo $metaTag->display();
    }

    public function testTwo()
    {
        $meta = new MetaExtend;
        $arr = ['title', 'content'];
        $assoc = ['title' => 'Good', 'content' => 'healthy'];

        $this->assertTrue($meta->isAssoc($assoc));
        $this->assertFalse($meta->isAssoc($arr));
    }

    public function testThree()
    {
        $meta = new Meta();

        $this->assertEmpty($meta->getProperties());
    }
}