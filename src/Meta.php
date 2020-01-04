<?php

namespace Cosmos\MetaTag;

class Meta
{
    /**
     * __construct
     *
     * @param array|null $data
     */
    public function __construct($data = null)
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
     * @return self
     */
    public function setProperties(array $array): self
    {
        foreach ($array as $key => $value) {
            $this->set($key, $value);
        }
        return $this;
    }

    /**
     * get properties as associative array
     *
     * @return array
     */
    public function getProperties(): array
    {
        return get_object_vars($this);
    }

    /**
     * default values. - It's for Override.
     *
     * @return array
     */
    public function defaultValues(): array
    {
        return [];
    }

    /**
     * set property
     *
     * @param  string $name
     * @param  string|array $value
     * @return self
     */
    public function set($name, $value): self
    {
        if ($name == 'keywords') {
            return $this->setKeywords($value);
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * get property
     *
     * @param  string $name
     * @return string|null
     */
    public function get($name): ?string
    {
        if (!property_exists($this, $name)) {
            return null;
        }
        return $this->{$name};
    }

    /**
     * remove property
     *
     * @param string $name
     * @return void
     */
    public function remove($name): void
    {
        if (property_exists($this, $name)) {
            unset($this->{$name});
        }
    }

    /**
     * isAssoc
     *
     * @param  array   $array
     * @return bool
     */
    public function isAssoc(array $array): bool
    {
        return array_keys($array) !== range(0, count($array) - 1);
    }

    /**
     * Set `keywords` property
     *
     * @param string|array $value
     * @return self
     */
    public function setKeywords($value): self
    {
        // if empty value, remove 'keywords' property.
        if (empty($value)) {
            $this->remove('keywords');
            return $this;
        }

        // if set keywords, merge with old value.
        if (is_string($value)) {
            $value = explode(',', $value);
        }
        $oldValue = empty($this->keywords)
            ? []
            : explode(',', $this->keywords);
        $value = array_unique(array_merge($oldValue, $value));
        $this->keywords = implode(",", $value);
        return $this;
    }
}
