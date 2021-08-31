<?php
declare(strict_types=1);

namespace Cyberkonsultant\Mapper;

class JsonMapper
{
    /**
     * @var $object
     */
    protected $object;

    /**
     * @param array|object|string $json $json
     * @param string $model
     * @return object
     */
    public function map($json, string $model)
    {
        if (is_string($json)) {
            $json = (array) json_decode($json, true);
        }

        $this->object = new $model();
        return $this->mapValues($json);
    }

    protected function mapValues(array $values)
    {
        foreach ($values as $key => $value) {
            $this->object->$key = $value;
        }

        return $this->object;
    }
}