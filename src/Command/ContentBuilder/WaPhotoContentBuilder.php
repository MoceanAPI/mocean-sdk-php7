<?php

namespace Mocean\Command\ContentBuilder;

class WaPhotoContentBuilder extends WaRichMediaContentBuilder
{
    public static function create()
    {
        return new self();
    }

    public function build()
    {
        $this->requestData["type"] = "photo";
        return parent::build();
    }
}