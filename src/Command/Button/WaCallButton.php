<?php


namespace Mocean\Command\Button;


class WaCallButton extends BaseWaButton
{
    public static function create()
    {
        return new self();
    }

    protected function type()
    {
        return "call";
    }
}