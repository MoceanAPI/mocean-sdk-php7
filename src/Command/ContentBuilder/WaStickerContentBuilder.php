<?php

namespace Mocean\Command\ContentBuilder;

class WaStickerContentBuilder extends WaRichMediaContentBuilder
{
    public static function create()
    {
        return new self();
    }

    public function build()
    {
        $this->requestData["type"] = "sticker";
        return parent::build();
    }
}