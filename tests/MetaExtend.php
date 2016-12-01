<?php 

use Cosmos\MetaTag\Meta;


class MetaExtend extends Meta
{
    /**
     * default values
     * 
     * @return array
     */
    public function defaultValues()
    {
        return [
            'title' => "Extended Title",
            'description' => "This is extend description text.",
            'author' => "James",
            'keywords' => ['PHP', 'Composer', 'Code', 'Github'],
            'image' => "http://php.net/images/logo.php",
            'url' => "https://github.com/archco/MetaTag"
        ];
    }
}