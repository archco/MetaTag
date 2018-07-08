<?php

namespace Cosmos\MetaTag;

class MetaTag extends Meta
{
    /**
     * __construct
     *
     * @param array|null $data
     */
    public function __construct($data = null)
    {
        parent::__construct($data);
    }

    /**
     * display meta tag
     *
     * @return string
     */
    public function display()
    {
        $items = $this->getProperties();
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
