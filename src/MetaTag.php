<?php 
namespace Cosmos\MetaTag;


class MetaTag
{
    protected $meta;

    function __construct(Meta $meta)
    {
        $this->setMeta($meta);
    }

    public function getMeta()
    {
        return $this->meta;
    }

    public function setMeta(Meta $meta)
    {
        $this->meta = $meta;
    }
}