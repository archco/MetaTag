<?php

namespace Cosmos\MetaTag;

class MetaTag
{
    protected $meta;

    public function __construct(Meta $meta)
    {
        $this->setMeta($meta);
    }

    /**
     * get Meta
     *
     * @return \Cosmos\MetaTag\Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * set Meta
     *
     * @param \Cosmos\MetaTag\Meta $meta
     */
    public function setMeta(Meta $meta)
    {
        $this->meta = $meta;
    }

    /**
     * display meta tag
     *
     * @return string
     */
    public function display()
    {
        $items = $this->meta->getProperties();
        $tag = "";

        foreach ($items as $name => $content) {
            $tag .= $this->makeTag($name, $content) . "\n  ";
        }
        return $tag;
    }

    /**
     * make meta tag
     * @param  string $name
     * @param  string $content
     * @return string
     */
    public function makeTag($name, $content)
    {
        if ($this->isOg($name)) {
            return "<meta property=\"$name\" content=\"$content\">";
        } else {
            return "<meta name=\"$name\" content=\"$content\">";
        }
    }

    /**
     * is open graph?
     *
     * @param  string  $name
     * @return bool
     */
    protected function isOg($name)
    {
        return substr($name, 0, 2) == 'og';
    }
}
