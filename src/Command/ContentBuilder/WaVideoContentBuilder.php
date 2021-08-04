<?php

namespace Mocean\Command\ContentBuilder;

class WaVideoContentBuilder extends WaRichMediaContentBuilder
{
    public static function create()
    {
        return new self();
    }

    public function build()
    {
        $this->requestData["type"] = "video";
        return parent::build();
    }
}