<?php 
include dirname(__dir__) . '/vendor/autoload.php';
include 'MetaExtend.php';

use Cosmos\MetaTag\Meta;
use Cosmos\MetaTag\MetaTag;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    protected $defaultValues = [];

    function __construct()
    {
        $this->defaultValues = [
            'title' => "Extended Title",
            'description' => "This is extend description text.",
            'author' => "Faul",
            'keywords' => ['PHP', 'Composer', 'Code', 'Github'],
            'image' => "http://php.net/images/logo.php",
            'url' => "https://github.com/archco/MetaTag"
        ];
    }

    public function testOne()
    {
        $meta = new MetaExtend($this->defaultValues);
        $meta->set('good', 'Things');
        $metaTag = new MetaTag($meta);
        
        var_dump($metaTag->getMeta()->get('good'));
        var_dump($metaTag->getMeta()->get('get'));
    }

    public function testTwo()
    {
        $meta = new MetaExtend;
        $arr = ['title', 'content'];
        $assoc = ['title' => 'Good', 'content' => 'healthy'];

        $this->assertTrue($meta->isAssoc($assoc));

        $this->assertFalse($meta->isAssoc($arr));
    }
}