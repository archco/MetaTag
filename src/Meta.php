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
            $this->set($key, $value);
        }
    }

    /**
     * get properties
     * 
     * @return array
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }

    /**
     * default values
     * 
     * @return array
     */
    public function defaultValues()
    {
        return [];
    }

    /**
     * set property
     * 
     * @param  string $name
     * @param  string|array $value
     * @return string
     */
    public function set($name, $value)
    {
        if ($name == 'keywords' && is_array($value)) {
            $value = implode(",", $value);
        }
        return $this->{$name} = $value;
    }

    public function get($name)
    {
        if (! isset($this->{$name})) {
            return null;
        }
        return $this->{$name};
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