<?php 

namespace Cosmos\MetaTag;

class Meta
{
    /**
     * __construct
     * 
     * @param array|null $data
     */
    function __construct($data = null)
    {
        $defaultValues = $this->defaultValues();
        $this->setProperties($defaultValues);

        if (is_array($data) && $this->isAssoc($data)) {
            $this->setProperties($data);
        }
    }

    /**
     * set properties
     * 
     * @param array $data
     * @return void
     */
    public function setProperties(array $array)
    {
        foreach ($array as $key => $value) {
            $this->createProperty($key, $value);
        }
    }

    /**
     * default values
     * 
     * @return array
     */
    public function defaultValues()
    {
        return [
            'title' => "Test Title",
            'description' => "This is description text.",
            'author' => "James",
            'keywords' => ['PHP', 'Composer', 'Code', 'Github'],
            'image' => "http://php.net/images/logo.php",
            'url' => "https://github.com/archco/MetaTag"
        ];
    }

    /**
     * create property
     * 
     * @param  string $name
     * @param  string|array $value
     * @return string
     */
    public function createProperty($name, $value)
    {
        if ($name == 'keywords' && is_array($value)) {
            $value = implode(",", $value);
        }
        return $this->{$name} = $value;
    }

    /**
     * isAssoc
     * 
     * @param  array   $array
     * @return bool
     */
    public function isAssoc(array $array)
    {
        return array_keys($array) !== range(0, count($array) - 1);
    }
}