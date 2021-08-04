<?php

namespace Mocean\Command\Button;

abstract class BaseWaButton extends AbstractButton
{
    abstract protected function type();

    protected function requiredKey()
    {
        return ["type"];
    }
    
    public function build()
    {
        $this->requestData["type"] = $this->type();
        return parent::build();
    }

}