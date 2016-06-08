<?php

namespace Braspag\Lib;

class Hydrator
{
    
    /**
     * @param $object
     * @param $data
     * @return mixed
     */
    static function hydrate(&$object, $data)
    {

        if (!\is_object($object)) {
            throw new \InvalidArgumentException('$object is not a valid PHP Object.');
        }

        if (!\is_array($data)) {
            throw new \InvalidArgumentException('$array is not a valid PHP Array.');
        }

        foreach ($data as $key => $value) {
            $method = 'set' . \ucfirst($key);
            if (\method_exists($object, $method)) {
                $object->$method($value);
            }
        }

        return $object;

    }
}