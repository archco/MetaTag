<?php 
namespace Cosmos\MetaTag;


class MetaTag
{
    protected $meta;

    function __construct(Meta $meta)
    {
        $this->setMeta($meta);
    }

    /**
     * get Meta
     * @return \Cosmos\MetaTag\Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * set Meta
     * @param \Cosmos\MetaTag\Meta $meta
     */
    public function setMeta(Meta $meta)
    {
        $this->meta = $meta;
    }

    /**
     * display mata tag
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
            return $this->makeOgTag($name, $content);
        }

        return $this->makeNormalTag($name, $content);
    }

    /**
     * is open graph?
     * 
     * @param  string  $name
     * @return bool
     */
    protected function isOg($name)
    {
        if (substr($name, 0, 2) == 'og') {
            return true;
        }
        return false;
    }

    /**
     * make normal meta tag
     * 
     * @param  string $name
     * @param  string $content
     * @return string
     */
    protected function makeNormalTag($name, $content)
    {
        return "<meta name=\"$name\" content=\"$content\">";
    }

    /**
     * make og meta tag
     * 
     * @param  string $name
     * @param  string $content
     * @return string
     */
    protected function makeOgTag($name, $content)
    {
        return "<meta property=\"$name\" content=\"$content\">";
    }
}