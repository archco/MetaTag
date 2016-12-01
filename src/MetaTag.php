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

    public function display()
    {
        $items = $this->meta->getProperties();
        $tag = "";

        foreach ($items as $name => $content) {
            $tag .= $this->makeTag($name, $content) . "\n  ";
        }
        return $tag;
    }

    public function makeTag($name, $content)
    {
        if ($this->isOg($name)) {
            return $this->makeOgTag($name, $content);
        }

        return $this->makeNormalTag($name, $content);
    }

    protected function isOg($name)
    {
        if (substr($name, 0, 2) == 'og') {
            return true;
        }
        return false;
    }

    protected function makeNormalTag($name, $content)
    {
        return "<meta name=\"$name\" content=\"$content\">";
    }

    protected function makeOgTag($name, $content)
    {
        return "<meta property=\"$name\" content=\"$content\">";
    }
}