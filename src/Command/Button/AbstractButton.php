<?php

namespace Mocean\Command\Button;

abstract class AbstractButton
{
    protected $requestData = [];

    /*
     *  return required key
     *
     *  @return array
     */
    abstract protected function requiredKey();


    abstract public static function create();

    public function build()
    {
        foreach ($this->requiredKey() as $param) {
            if (!isset($this->requestData[$param])) {
                throw new \InvalidArgumentException('missing expected key `' . $param . '` from ' . static::class);
            }
        }
        return $this->requestData;
    }

}