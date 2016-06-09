<?php

namespace Braspag\Model;

class ExtraData extends AbstractModel
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var mixed
     */
    private $value;

    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'value' => $this->getValue(),
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ExtraData
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return ExtraData
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }


}
