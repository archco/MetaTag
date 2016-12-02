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
        // use both.
        $meta = new Meta($this->testValues);
        $metaTag = new MetaTag($meta);

        echo $metaTag->display() . PHP_EOL;
    }

    public function testTwo()
    {
        // Use only meta as data object
        $meta = new Meta($this->defaults);
        // add property
        $meta->good = "thing";
        $meta->set('name', 'content');
        // modify property
        $meta->author = "James";
        $meta->set('name', 'another content');
        // remove property
        $meta->remove('good');

        $this->assertNotEmpty($meta->getProperties());
        var_dump($meta);
        echo PHP_EOL;
    }

    public function testThree()
    {
        // use extends Meta
        $meta = new MetaExtend;
        
        $this->assertInstanceOf(Meta::class, $meta);
        var_dump($meta);
        echo PHP_EOL;
    }
}