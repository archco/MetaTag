<?php 
include dirname(__dir__) . '/vendor/autoload.php';
include 'MetaExtend.php';

use Cosmos\MetaTag\Meta;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testOne()
    {
        $meta = new MetaExtend(['title' => 'Extended']);
        $meta->createProperty('good', 'Things');
        
        var_dump($meta);
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