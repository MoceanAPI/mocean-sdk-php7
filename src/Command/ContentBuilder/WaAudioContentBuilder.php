<?php

namespace Mocean\Command\ContentBuilder;

class WaAudioContentBuilder extends WaRichMediaContentBuilder
{
    public static function create()
    {
        return new self();
    }

    public function build()
    {
        $this->requestData["type"] = "audio";
        return parent::build();
    }
}