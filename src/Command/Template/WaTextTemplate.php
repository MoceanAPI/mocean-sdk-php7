<?php

namespace Mocean\Command\Template;

class WaTextTemplate extends BaseWaTemplate
{
    public static function create()
    {
        return new self();
    }

    protected function type()
    {
        return "text";
    }
}